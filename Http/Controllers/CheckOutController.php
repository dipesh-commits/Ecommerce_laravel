<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index(){
    	return view('front.checkout.index');
    }

    public function store(Request $request){
    	dd($request->all());
    }
}
