<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders=Order::all();
    	return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){
    	//find the order

    	$order=Order::find($id);


    	//update the order
    	$order->update(['status'=>1]);


    	//session message and redirection
    	session()->flash('msg','Order has been confirmed');
    	return redirect('/admin/orders');
    }

     public function pending($id){
    	
    	//find the order 
    	$order=Order::find($id);


    	//update the order status
    	$order->update(['status'=>0]); 

    	//session message
    	session()->flash('msg','Order has been to pending');
    	return redirect('/admin/orders');

    }

    public function show($id){
    	return $id;

    }
}
