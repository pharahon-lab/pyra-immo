<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Pass;
use App\Models\PassType;
use App\Models\Place;
use App\Models\Promotions;
use App\Models\Transactions;
use App\Models\User;
use App\Models\VisitesDone;
use App\Services\PassServices;
use App\Services\TransactionServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassApiController extends Controller
{
    public function getAllPassTypes()
    {
        $datas = PassType::get();
        return response()->json($datas);
    }

    public function getPassPromos($pass_type_id)
    {
        $datas = Promotions::where('promotionnable_type', PassType::class)
        ->where('promotionnable_id', $pass_type_id)
        ->whereDate('start', '<=', today())
        ->whereDate('end', '>=', today())->get();
        return response()->json($datas);
    }


    
    public function buyPass(Request $request, PassServices $passService, TransactionServices $transactionService)
    {
        // $transaction = $transactionService->newTrannsaction($request->transaction);
        $transaction = $transactionService->freeTrannsaction();
        $pass_type = PassType::find($request->pass_type_id);

        $pass = $passService->new_pass($pass_type, $transaction);
        $res['pass_type'] = $pass_type;
        $res['pass'] = $pass;
        return response()->json($res);
    }
    
    public function prolongePass(Request $request, PassServices $passService, TransactionServices $transactionService)
    {
        // $transaction = $transactionService->newTrannsaction($request->transaction);
        $transaction = $transactionService->freeTrannsaction();
        $pass_type = PassType::find($request->pass_type_id);
        $pass_id = $request->pass_id;
        $pass = $passService->prolonge_pass($pass_id, $pass_type, $transaction);
        return response()->json($pass);
    }
    
    public function buyPassVisite(Request $request)

    {

        // recupère les données pour la transaction (transaction_number, amount, transaction_way, transaction_type, operation_id ) et le type de pass depuis l'utilisateur



        // vérification au près de cinetpay de la transaction

        $isPayed = true;

        // $isPayed = $this->checkStatutTransactions($request->transaction_number, $request->amount);



        // si la transaction est validé, créer la transaction et le pass

        if($isPayed){

            //succes

            //on enregistre la transaction

            $transaction = Transactions::create(

                [

                    'transaction_number'=>$request->transaction_number,

                    'date_transaction'=>now(),

                    'amount'=>$request->amount,

                    'transaction_way'=>$request->transaction_way,

                    'transaction_type'=>$request->transaction_type,

                    'operation_id'=>$request->operation_id,

                    'created_at'=>now(),

                ]

            );

            //on enregistre le pass_visite

            $uniqid = uniqid('pass_visite',true);



            //on recupere le type de passe

            $data_type_pass = PassType::findOrFail($request->pass_type_id);

            $passvisite = Pass::create(

                [

                    'transaction_number'=>$request->transaction_number,

                    'code'=>substr($uniqid, 0, 8),

                    'end_date'=>date('Y-m-d', strtotime(' + 7 days')),

                    'nb_visite'=>$data_type_pass->nb_visite,

                    'is_expired'=>false,

                    'is_confirmed'=>1,

                    'pass_type_id'=>$data_type_pass->id,

                    'transaction_id'=>$transaction->id,

                    'created_at'=>now(),



                ]

            );



            //on enregistre dans les cookies

            $cookiePassVisite = cookie('code_passvisite', $passvisite->code, 10080);



            $data['transaction'] = $transaction;

            $data['passvisite'] = $passvisite;

            $data['cookie'] = $cookiePassVisite;



            return response()->json($data)->cookie($cookiePassVisite);



        }

        else

        {

            return 'Ce payement n\'a pas été reconnu';

        }



        //return response()->json($isPayed);



    }



    public function prolongePassVisite(Request $request)

    {

        // recupère les données pour la transaction (transaction_number, amount, transaction_way, transaction_type, operation_id ) et le type de pass depuis l'utilisateur



        // vérification au près de cinetpay de la transaction

        $isPayed = true;

        // $isPayed = $this->checkStatutTransactions($request->transaction_number, $request->amount);



        // si la transaction est validé, créer la transaction et le pass

        if($isPayed){

            //succes

            //on enregistre la transaction

            $transaction = Transactions::create(

                [

                    'transaction_number'=>$request->transaction_number,

                    'date_transaction'=>now(),

                    'amount'=>$request->amount,

                    'transaction_way'=>$request->transaction_way,

                    'transaction_type'=>$request->transaction_type,

                    'operation_id'=>$request->operation_id,

                    'created_at'=>now(),

                ]

            );

            // on récupère le code

            $code = $request->code;

            //on recupere le type de passe

            $data_type_pass = PassType::findOrFail($request->pass_type_id);



            $passvisite = Pass::with('passType','transaction')

                ->where('code',$code)->first();

            /*$passvisite->nb_visite = $data_type_pass->nb_visite;

            $passvisite->transaction_number = $request->transaction_number;

            $passvisite->pass_type_id = $data_type_pass->id;

            $passvisite->end_date = date_add($passvisite->end_date, date_interval_create_from_date_string('+ 7 days'));

            $passvisite->save();*/



            $passvisite->update([

                'nb_visite'=>$passvisite->nb_visite + $data_type_pass->nb_visite,

                'transaction_number' => $request->transaction_number,

                'pass_type_id' => $data_type_pass->id,

                'end_date' => date_add(date_create($passvisite->end_date), date_interval_create_from_date_string('+ 7 days'))->format('Y-m-d H:i:s'),

            ]);



            $data['transaction'] = $transaction;

            $data['passvisite'] = $passvisite;



            return response()->json($data);



        }

        else

        {

            return 'Ce payement n\'a pas été reconnu';

        }



    }



    // one visite faite on décrémente de 1 le nombre de visites du pass

    public function passTrigger(Request $request, PassServices $passService,)
    {

        // l'utilisatuer quand il visite  une maison nous envoie le code du pass utilisé avec l'id de la maison visité

        $code = $request->code;

        $placeId = $request->place_id;



        // récupère le pass visite avec les maisons visité aux quelles il est lié dans la table "visites effectué"

        $pass = Pass::where('code',$code)->first();

        $place = Place::where('id',$placeId)->first();

        $fascade = $place->fascade;


        if($pass == null){
            return response()->json(["errors" => 'Code erronée'], 401);
        }


        if($place == null){
            return response()->json(["errors" => 'Erreur innatendue'], 401);
        }

        if($pass->is_expired){

            return response()->json(["errors" => "Pass Expiré"], 401);

        }

        if($pass->nb_visite<=0)
        {
            $pass->is_expired = 1;

            return response()->json(["errors" => "Pass Expiré"], 401);

        }

        $checkData = VisitesDone::where('pass_visite_id',$pass->id)

            ->where('place_id',$placeId)->first();



        // si l'id de la maison est dans la liste ne rien faire

        if($checkData == null){   

            $pass = $passService->house_visited($pass->id, $place);

        }



        return response()->json($pass);



    }



    public function verifPassVisite(Request $request)

    {
        $input = $request->all();
        $val = Validator::make($input, [
            'code' => ['required', 'string', 'max:10'],
        ]);

        if($val->fails()){
            return response()->json(["errors" => $val->messages()], 401);
        }else{
            $code = $request->code;

            $data = Pass::with('pass_type','transaction')

                ->where('code',$code)->firstOrFail();
            
            return response()->json($data);
        }

    }

    

    public function getPassVisitePlaces(Request $request)

    {

        $code = $request->code;

        $pass = Pass::where('code',$code)->first();

        // $data = VisitesDone::where('pass_id',$pass->id)->get();



        if ($pass) {

            // $visiteEffectue = $pass->visiteEffectue()->with('places')->get();

            $visiteEffectue = $pass->places()->get();

            return response()->json($visiteEffectue);

        }else {


            return response()->json(["errors" => 'Erreur innatendue'], 401);


        }





    }




}
