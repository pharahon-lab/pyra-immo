<?php

namespace App\Actions;

use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Services\AbonnementServices;

class BuyAbonnement{
    public function handle(Request $request, Transactions $transaction, AbonnementServices $abonnementServices){
        /// here we will handle the action of buying an abonnement. 
        /// this appen after the transaction have been create and verified
        /// From the request we will get
        ///     + user info, thus facade info
        ///     + abonnement type
        ///
        /// We will create the abonnement if there is no active one related to the fascade
        /// if there is an abonnement, we will put it in inavtive mode and crete the new one startind from start day


    
    }
}