<?php

namespace App\Actions\Fortify;

use App\Models\FascadeImmo;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['nom'].' '.$input['prenoms'],
                'nom' => $input['nom'],
                'prenoms' => $input['prenoms'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createFascade($user);
                $this->createTeam($user);
            });
        });
    }
    

    /**
     * Create a personal team for the user.
     */
    protected function createFascade(User $user): void
    {
        $f = FascadeImmo::forceCreate([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'description' =>  'Calalogue de propriétées de' . $user->name ,
        ]);
        $f->save();
        $user->fascade_immo_id = $f->id;
        $user->save();
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
