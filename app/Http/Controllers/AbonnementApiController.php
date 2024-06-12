<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\AbonnementType;
use App\Models\Place;
use App\Models\Transactions;
use App\Models\User;
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

    
    public function buyAbonement(Request $request)
    {
        // recupère les données pour la transaction (transaction_number, amount, transaction_way, transaction_type, operation_id ) et le type de pass depuis l'utilisateur

        // vérification au près de cinetpay de la transaction
        $isPayed = true;
        // $isPayed = $this->checkStatutTransactions($request->transaction_number, $request->amount);

        // si la transaction est validé, créer la transaction et l'abonnement
        if($isPayed){
            //succes
            //on save la transaction
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
            $uniqid = uniqid();
            $dayAfter = (now())->format('Y-m-d');
            $oldAbonnement = Abonnement::where('user_id', '=',$request->user_id)->where('end_date', '>', $dayAfter)->sortByDate('end_date')->first();
            $sd = now();
            if ($oldAbonnement) {
                $sd = $oldAbonnement->end_date;
            }
            $abonnement = Abonnement::create(
                [
                    'type'=>$request->type,
                    'type_abonnement_id'=>$request->type_abonnement_id,
                    'start_date'=>$sd,
                    'end_date'=>date('Y-m-d', strtotime(' + 1 month')),
                    'transaction_id'=>$transaction->id,
                    'created_at'=>now(),
                    'user_id'=>$request->user_id,
                    'is_actif'=>1
                ]
            );

            $user_places = Place::where('user_id',$request->user_id)->get();
            $user = User::where('user_id',$request->user_id)->get()->first();
            $user->is_suspended = false;
            foreach ($user_places as $item)
            {
                if($item->is_validated==false)
                {
                    $item->is_validated =true;
                    $item->save();
                }
            }

            $data['transaction'] = $transaction;
            $data['abonnement'] = $abonnement;

            return response()->json($data);

        }
        else
        {
            return 'Ce payement n\'a pas été reconnu';
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
