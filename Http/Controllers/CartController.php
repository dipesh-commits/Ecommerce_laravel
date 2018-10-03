<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
    public function index(){
    	return view('front.cart.index');
    }

    public function store(Request $request){

    	$duplicate=Cart::search(function($cartItem,$rowId) use($request){
    		return $cartItem->id===$request->id;
    	});

    	if($duplicate->isNotEmpty()){
    		return redirect()->back()->with('msg','Your item is already in the cart');
    	}


    	$product=new Product();
    	Cart::add($request->id,$request->name,1,$request->price)->associate($product);



    	session()->flash('msg','The item has been added to the cart');
    	return redirect('/');

    }

    public function destroy($id){
    	Cart::remove($id);
    	return redirect()->back()->with('msg','The item has been removed from the cart');
    }

    public function saveLater($id){


    	

    	$item=Cart::get($id);
    	Cart::remove($id);

    	$duplicate=Cart::instance('saveForLater')->search(function($cartItem,$rowId) use($id){
    		return $cartItem->id===$id;
    	});

    	if($duplicate->isNotEmpty()){
    		return redirect()->back()->with('msg','Your item is already in the save for later');
    	}

    	Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

    	return redirect()->back()->with('msg','Your item has been added to save For later');
    }
}
