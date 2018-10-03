<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FrontRegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
    	return view('front.userregistration');
    }

    public function store(Request $request){
    	
    	//Validate the form
    	$request->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required|confirmed',
    		'address'=>'required'
    	]);

    	//Save the user's data

    	$user=User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>bcrypt($request->password),
    		'address'=>$request->address
    	]);

    	//sign in the user
    	auth()->login($user);

    	//redirect to next page
    	return redirect('/user/profile');
    }
}
