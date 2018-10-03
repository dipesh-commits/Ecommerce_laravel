<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontHomeController extends Controller
{
    public function index(){

    	$products=Product::inRandomOrder()->get();
    	return view('front.index',compact('products'));
    }
}
