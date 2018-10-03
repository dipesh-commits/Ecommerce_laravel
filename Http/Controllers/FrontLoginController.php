<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FrontLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest')->except('logout');
	}

    public function index(){
    	return view('front.frontlogin');
    }

    public function store(Request $request){
    	//Validate the form

    	$rules=[
    		'email'=>'required',
    		'password'=>'required'
    	];

    	$request->validate($rules);

    	//user login
    	$datas=$request->only('email','password');

    	
    	if( !auth()->attempt($datas)){
    	return redirect()->back()->withErrors([
    			'message'=>'Your email and password does not match'
    		]);	
    		


    	  }
    	
    	  return redirect('/user/profile');
    	 }

    	 public function logout(){
    	 	auth()->logout();

    	 	session()->flash('msg','You have been logged out successfully');

    	 	return redirect('/user/login');
    	 }

}
