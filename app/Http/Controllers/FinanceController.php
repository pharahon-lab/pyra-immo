<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index(){
    return view('catalogue.finance.index');
    }

    
    public function manage(){
        return view('catalogue.finance.manage');
        }

    
    public function retrait(){
    return view('catalogue.finance.retrait');
    }
}
