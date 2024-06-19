<?php

namespace App\Services;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TransactionServices{
    
    
    public function __construct()
    {
    }

    /// this sevice will hold the methods and function to act on transactions

    public function newTrannsaction(array $data) : Transactions{
        /// create a new transaction .

        $transaction = Transactions::create([
            'transaction_number' => $data['transaction_number'],
            'operation_id' => $data['operation_id'],
            'date_transaction' => $data['date'],
            'amount' => $data['amount'],
            'transaction_way' => $data['transaction_way'],// mobile / web
            'transaction_type' => $data['transaction_type'],//Cinet_pay
        ]);
        return $transaction;
    }
    public function freeTrannsaction() : Transactions{
        return Transactions::where('operation_id', '000BasePyraImmo')->first();
    }

    /// new transaction for free abonnemnt
    public function newBaseAbonnementTrannsaction(User $user, array $data) : Transactions{
        /// create a new transaction .

        $transaction = Transactions::create([
            'transaction_number' => 'transaction_number',
            'operation_id' => 'operation_id',
            'date_transaction' => today(),
            'amount' => $data['amount'],
            'transaction_way' => 'mobile',
            'transaction_type' => 'Cinet_pay',
        ]);
        return $transaction;
    }
    
    public function checkStatutTransactions($cpm_trans_id, $amount)
    {
        /// fonction pour vérifier si le payement a bien été effectué au niveau de cinetpay

        $response = Http::post('https://api-checkout.cinetpay.com/v2/payment/check',[
            'apikey ' => '412126359654bb6ed651509.14435556',
            'site_id ' => '5865665',
            'transaction_id  ' => $cpm_trans_id,
        ]);

        $jsonData = $response->json();

        /// on verifier que le payement est réussi et la some est bonne
        if ($jsonData->code == '00' && $jsonData->data->amount == $amount) {
            return true;
        } else {
            return false;
        }

    }


}