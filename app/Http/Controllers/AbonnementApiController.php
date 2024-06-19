<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\AbonnementType;
use App\Models\Place;
use App\Models\Promotions;
use App\Models\Transactions;
use App\Models\User;
use App\Services\AbonnementServices;
use App\Services\TransactionServices;
use Illuminate\Http\Request;

class AbonnementApiController extends Controller
{
    //GESTION DES TYPES D'ABONNEMENTS
    public function getAllTypeAbonnements()
    {
        $datas = AbonnementType::get();
        return response()->json($datas);
    }

    public function getTypeAbonnement($id)
    {
        $data = AbonnementType::findOrFail($id);
        return response()->json($data);
    }
    
    public function getAbonnementPromos($abonnement_type_id)
    {
        $datas = Promotions::where('promotionnable_type', AbonnementType::class)
        ->where('promotionnable_id', $abonnement_type_id)
        ->whereDate('start', '<=', today())
        ->whereDate('end', '>=', today())->get();
        return response()->json($datas);
    }


    
    public function buyAbonnement(Request $request, AbonnementServices $abonnementServices, TransactionServices $transactionService)
    {
        /// get abonnement type id from the request
        $abonnement_type_id = $request->abonnement_type_id;
        // si la transaction est validé, créer la transaction et l'abonnement
        if($abonnement_type_id){
            
            $abonnement_type = AbonnementType::find($abonnement_type_id);
            
            //verify transaction
            $verif = true;
            // $verif = $transactionService->checkStatutTransactions($request->transaction->transaction_number, $request->transaction->amount);

            if($verif){
            
                //on save la transaction

                // $transaction = Transactions::create(
                //     [
                //         'transaction_number'=>$request->transaction->transaction_number,
                //         'date_transaction'=>now(),
                //         'amount'=>$request->transaction->amount,
                //         'transaction_way'=>$request->transaction->transaction_way,
                //         'transaction_type'=>$request->transaction->transaction_type,
                //         'operation_id'=>$request->transaction->operation_id,
                //         'created_at'=>now(),
                //     ]
                // );

                $transaction = $transactionService->freeTrannsaction();
                $user = $request->user();

                $abonnement = $abonnementServices->newAbonnement($user, $abonnement_type, $transaction);
                $abonnement['type_abonnement'] = $abonnement_type;

                $data['transaction'] = $transaction;
                $data['abonnement'] = $abonnement;

                return response()->json($data);

            } else {
                return response()->json(["errors" => 'Ce payement n\'a pas été reconnu'], 401);
            }

        }
        else
        {
            return response()->json(["errors" => 'Erreur innatendu'], 401);
        }

    }

    public function freeAbonement(Request $request)
    {

        //on save l'abonnement
        $abonnement = Abonnement::create(
            [
                'type'=>$request->type,
                'type_abonnement_id'=>$request->type_abonnement_id,
                'start_date'=>now(),
                'end_date'=>date('Y-m-d', strtotime(' + 1 month')),
                'transaction_id'=>1,
                'created_at'=>now(),
                'user_id'=>$request->user_id,
                'is_actif'=>1
            ]
        );

        $data['abonnement'] = $abonnement;

        return response()->json($data);
    }

    public function getAbonnement($id)
    {
        $data = Abonnement::findOrFail($id);
        return response()->json($data);
    }
}
