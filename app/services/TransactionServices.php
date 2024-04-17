<?php

namespace App\Services;

use App\Models\Transactions;
use App\Models\User;

class TransactionServices{
    
    
    public function __construct()
    {
    }

    /// this sevice will hold the methods and function to act on transactions

    public function newTrannsaction(array $data) : Transactions{
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


}