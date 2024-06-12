<?php

namespace App\Http\Controllers;

use App\Models\AbonnementType;
use App\Models\FascadeImmo;
use App\Models\PassType;
use App\Models\Place;
use App\Models\Team;
use App\Models\User;
use App\Services\AbonnementServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    // 
    public function index(){
        $abonnement_types = AbonnementType::all();
        $pass_types = PassType::all();
        $places = Place::all();
        return view('home.index', ['abonnement_types' => $abonnement_types, 'pass_types' => $pass_types, 'places' => $places]);
    }

    
    public function showroom(){
        $places = Place::all();
        return view('showroom.index', ['places' => $places]);
    }

    
    public function showroom_show($place_id){
        $place = Place::find($place_id);
        return view('showroom.show', ['place' => $place]);
    }
    
    public function showroom_category($category){
        
        return view('showroom.category');
    }
    
    public function search_index(){
        
        return view('search.index');
    }
    
    public function search($request){
        
        return view('search.index');
    }
    
}
