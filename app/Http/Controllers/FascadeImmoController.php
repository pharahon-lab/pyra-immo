<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FascadeImmoController extends Controller
{
    
    public function dashboard(){
        return view('catalogue.dashboard');
    }
}
