<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    

    public function index(){
        return view('catalogue.places.index');
    }
    
    public function create(){
        return view('catalogue.places.create');
    }
    
    public function edit(){
        return view('catalogue.places.edit');
    }

}
