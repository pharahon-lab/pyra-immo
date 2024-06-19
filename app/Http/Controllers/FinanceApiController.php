<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Generator\RandomGeneratorInterface;
use Random\Randomizer;

class FinanceApiController extends Controller
{
    
    //GESTION DES TRANSACTIONS
    public function getAllTransactions()
    {
        $datas = Transactions::get();
        return response()->json($datas);
    }

    public function getTransaction($id)
    {
        $data = Transactions::findOrFail($id);
        return response()->json($data);
    }

    public function getTransactionNumber($type)
    {
        $transaction_number = 'Pyra_Immo';
        $hash = Hash::make(bin2hex(random_bytes(12)));
        $transaction_number = $transaction_number.$hash.$type;
        // fonction pour vérifier si le payement a bien été effectué au niveau de cinetpay
        $response['transaction_number'] = $transaction_number;

        return response()->json($response);

    }


}
