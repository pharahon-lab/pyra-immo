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
}
