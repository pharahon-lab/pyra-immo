<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\FascadeImmo;
use App\Models\Place;
use App\Models\Team;
use App\Models\User;
use App\Services\AbonnementServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthApiController extends Controller
{

    
    //AUTHENTIFICATION
    public function login(Request $request){
        $input = $request->all();
        $val = Validator::make($input, [
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($val->fails()){
            return response()->json(["errors" => $val->messages()], 401);
        }else{
            $checkUser = User::where('phone', $request->phone)->first();
            if($checkUser == null){
                return response()->json(["errors" => 'Mot de passe ou numero de telephone incorrect'], 401);
            }
            else
            {
                if (!Hash::check($request->password, $checkUser->password))
                {
                    return response()->json(["errors" => 'Mot de passe ou numero de telephone incorrect'], 401);
                }
                else
                {
                    $credentials = $request->only('phone', 'password');
                    $login = Auth::attempt($credentials);
                    $data['user'] = $checkUser;
                    if($login)
                    {

                        $fascade = $checkUser->fascadeImmo;
                        $data['fascade'] = $fascade;
                        $data['abonnement'] = $fascade->latestAbonnement;

                        $data['places'] = $fascade->places;
                        /// if (user id = fascade->user_id ) => abilities = fascade:* ? get from team {'editeur': read + update; 'viewer': read; 'manageur':  read + update + manage; 'finance': add from creator}
                        $data['token'] = $checkUser->createToken('Mob-Tok'.str_shuffle($checkUser->phone))->plainTextToken;

                        return response()->json($data, 200);
                    }
                    else
                    {
                        return response()->json(["errors" => 'Mot de passe ou numero de telephone incorrect'], 401);
                    }
                }
            }

        }


    }

    
    public function register(Request $request)
    {
        $input = $request->all();
        $val = Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'],
            'country_id' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($val->fails()){
            return response()->json(["errors" => $val->messages()], 401);
        }else{

            $user = DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['nom'].' '.$input['prenoms'],
                    'nom' => $input['nom'],
                    'prenoms' => $input['prenoms'],
                    'email' => $input['email'],
                    'country_id' => $input['country_id'],
                    'phone' => $input['phone'],
                    'password' => Hash::make($input['password']),
                ]), function (User $user) {
                    $this->createFascade($user);
                    $this->createTeam($user);
                });
            });
            $data['user'] = $user;
            $data['fascade'] = $user->fascadeImmo;
            $data['abonnement'] = $user->fascadeImmo->latestAbonnement;
            $data['token'] = $user->createToken('Mob-Tok'.str_shuffle($user->phone))->plainTextToken;

            return response()->json($data, 200);

        }

    }
    
    public function updateUser(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->nom = $request->nom;
        $data->prenoms = $request->prenoms;
        $data->name = $request->nom . ' '. $request->prenoms;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->is_staff = $request->is_staff;
        $data->is_demarcheur = $request->is_demarcheur;
        $data->is_suspended = $request->is_suspended;
        $data->password = Hash::make($request->password);
        $data->remember_password = $request->password;
        $data->updated_at = now();
        $data->save();
        //return response()->json($data);
    }

    public function deleteUser(Request $request, $id)
    {
        $data = User::where('id',$id)->delete();
        if($data)
        {
            return 'Suppression ok';
        }
        else
        {
            return 'Une erreur est survenue';
        }

    }


    public function auth_redirect($provider){
        
        return Socialite::driver($provider)->redirect();
    }

    public static function auth_callback($provider) {
        $social_User = Socialite::driver($provider)->user();

        $user = DB::transaction(function () use ($social_User, $provider) {
            return tap(User::updateOrCreate([
                'name' => $social_User->name,
                'nom' => $social_User->lastname??'',
                'prenoms' => $social_User->firstname??'',
                'email' => $social_User->email,
                'country_id' => 1,
                'provider' => $provider,
                'provider_token' => $social_User->token,
                'provider_refresh_token' => $social_User->refreshToken,
                'phone' => $social_User->phone??'',
            ]), function (User $user_temp) {
                $this->createFascade($user_temp);
                $this->createTeam($user_temp);
            });
        });

        Auth::login($user);

        return redirect()->route('home');
    }
    

    /**
     * Create a personal team for the user.
     */
    protected function createFascade(User $user): void
    {   
        $abonnementServices = new AbonnementServices();
        $f = FascadeImmo::forceCreate([
            'user_id' => $user->id,
            'name' => 'Immo'.$user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'description' =>  'Calalogue de propriétées de' . $user->name ,
        ]);
        $f->save();
        $user->fascade_immo_id = $f->id;
        $user->save();
        $abonnementServices->defaultAbonnement($user);
    }


    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

}
