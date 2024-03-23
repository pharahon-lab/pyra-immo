<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index(){
        return view('catalogue.abonnement.index');
    }

    
    public function create(){
        return view('catalogue.abonnement.create');
    }

    
    public function edit(){
        return view('catalogue.abonnement.edit');
    }
}
