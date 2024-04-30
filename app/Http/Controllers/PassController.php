<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\PassType;
use App\Models\User;
use App\Services\PassServices;
use App\Services\TransactionServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassController extends Controller
{
    

    public function index(){
        return view('home.pass.index');
    }
    public function checkPassCode($ab_t, $code) {
        return "Code : ".$code;
    }

    public function payer($pass_type_id){
        $pass_type = PassType::where('id' , $pass_type_id)->first();
        return view('home.pass.payer', ['pass_type' => $pass_type]);
    }

    public function payement($pass_id){
        $pass = Pass::where('id' , $pass_id)->first();
        
        return view('home.pass.pass', ['pass' => $pass]);
    }
}
