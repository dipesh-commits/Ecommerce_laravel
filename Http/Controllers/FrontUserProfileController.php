<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FrontUserProfileController extends Controller
{
    public function index(){

    	$id=auth()->user()->id;
    	$user=User::where('id',$id)->first();
    	return view('front.userprofile',compact('user'));
    }

    public function show($id){
    	dd($id);

    }
}
