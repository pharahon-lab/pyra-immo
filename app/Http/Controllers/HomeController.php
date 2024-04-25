<?php

namespace App\Http\Controllers;

use App\Models\AbonnementType;
use App\Models\PassType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 
    public function index(){
        $abonnement_types = AbonnementType::all();
        $pass_types = PassType::all();
        return view('home.index', ['abonnement_types' => $abonnement_types, 'pass_types' => $pass_types]);
    }

    

}
