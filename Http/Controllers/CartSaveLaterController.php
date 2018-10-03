<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartSaveLaterController extends Controller
{
    public function destroy($id){
    	
    	Cart::instance('saveForLater')->remove($id);
    	return redirect()->back()->with('msg','Your item has been removed from save for Later');
    }

    public function movetocart($id){


    	

    	$item=Cart::instance('saveForLater')->get($id);
    	Cart::instance('saveForLater')->remove($id);

    	$duplicate=Cart::instance('saveForLater')->search(function($cartItem,$rowId) use($id){
    		return $cartItem->id===$id;
    	});

    	if($duplicate->isNotEmpty()){
    		return redirect()->back()->with('msg','Your item is already in the save for later');
    	}

    	Cart::instance('default')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

    	return redirect()->back()->with('msg','Your item has been added to cart');
    }
}
