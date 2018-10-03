<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

   

    public function index(){
    	return view('admin.login');
    }

    public function store(Request $request){
    	//Validate the user

    	$request->validate([
    		'email'=>'required',
    		'password'=>'required'
    	]);

    	//Log the user in
    	$credentials = $request->only('email','password');

    	if(!Auth::guard('admin')->attempt($credentials)){
    		return back()->withErrors([
    			'message'=>'Wrong credentials']);
    	}

    	//session
    	session()->flash('msg','You have logged in');

    	//redirext
    	return redirect('/admin');

    }

    public function logout(){
        auth()->guard('admin')->logout();

        session()->flash('msg','You have been logged out');

        return redirect('/admin/login');
    }
}
