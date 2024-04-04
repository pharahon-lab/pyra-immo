<?php

namespace App\Http\Controllers;

use App\Models\AbonnementType;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index(){
        return view('catalogue.abonnement.index');
    }

    
    public function create(){
        $ab_types = AbonnementType::all();
        return view('catalogue.abonnement.create', ['abonnement_types' => $ab_types]);
    }

    
    public function edit(){
        return view('catalogue.abonnement.edit');
    }
    
    public function checkPromoCode($ab_t, $code) {
        return "Code : ".$code;
    }

    public function resume($ab_type){
        $abonnement_type = AbonnementType::where('id' , $ab_type)->first();
        return view('catalogue.abonnement.resume', ['abonnement_type' => $abonnement_type]);
    }
    public function payement($ab_type, $promotion_code){
        $abonnement_type = AbonnementType::where('id' , $ab_type)->first();
        return view('catalogue.abonnement.resume', ['abonnement_type' => $abonnement_type]);
    }
}
