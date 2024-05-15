<?php

namespace App\Services;

use App\Models;
use App\Models\Pass;
use App\Models\PassType;
use App\Models\Place;
use App\Models\Transactions;
use App\Models\VisitesDone;
use Illuminate\Contracts\Session\Session;

class PassServices{
    
    /// create a new pass
    public function new_pass(PassType $pass_type, Transactions $transaction){
        /// 1. get the transaction and pass type
        /// 2. create pass & return the code
        $start = today();
        
        $uniqid = uniqid('pass_visite',true);

        $pass = Pass::create([
            'code' => substr($uniqid, 16, 8),
            'end_date' => date('Y-m-d', strtotime('+ 1 week', $start->toDate()->getTimestamp())),
            'nb_visite' => $pass_type->nb_visite,
            'transaction_number' => $transaction->transaction_number,
            'transaction_id' => $transaction->id,
            'pass_type_id' => $pass_type->id,
        ]);
        session(['pass' => $pass]);
        session(['pass_id' => $pass->id]);
        return $pass;

    }

    /// create prolonge pass
    public function prolonge_pass(PassType $pass_type, Transactions $transaction){

        /// 1. get the pass from session,
        $pass_id = session('pass_id');
        $pass = Pass::where('id', $pass_id)->first();
        /// 2. get the transaction and pass type, set the start day
        /// 3. update old pass according to the pass type
        $pass->end_date = date('Y-m-d', strtotime('+ 1 week', date_create($pass->end_date)->getTimestamp()));
        $pass->nb_visite = $pass->nb_visite + $pass_type->nb_visite;
        $pass->pass_type_id = $pass_type->id;
        $pass->transaction_number = $transaction->transaction_number;
        $pass->transaction_id = $transaction->id;
        $pass->save();

        session(['pass' => $pass]);
        session(['pass_id' => $pass->id]);

        /// 4. return the pass
        return $pass;
    }

    /// create company pass
    public function company_pass(){

        /// 1. create a company pass & return the code
        $start = today();
        
        $uniqid = uniqid('pass_visite',true);


        $pass = Pass::create([
            'code' => substr($uniqid, 12, 20),
            'end_date' => date('Y-m-d', strtotime('+ 1 week', $start->toDate()->getTimestamp())),
            'nb_visite' => 10,
            'transaction_number' => '0',
            'transaction_id' => 1,
            'pass_type_id' => 3,
        ]);
        return $pass;
    }

    /// house visited (-1 visite on the pass)
    public function house_visited(Place $place){
        /// 1. get the pass 
        $pass = Session('pass');

        /// 2. get the house 
        /// 3. decrement pass visites 
        $pass->nb_visites = $pass->nb_visites - 1;
        $pass->save();
        /// 4. increment house views
        $place->views++;
        $place->save();

        /// 5. add record to housevisited table
        VisitesDone::create(
            [
                'pass_visite_id'=>$pass->id,
                'place_id'=>$place->id,
            ]
        );
    }

}