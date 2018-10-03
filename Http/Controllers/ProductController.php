<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        $products=Product::all();
        return view('admin.products.index',compact('products'));


    }

    public function create(){

        $product=new Product();
    	return view('admin.products.create',compact('product'));
    }

    public function store(Request $request){
    	//validate the form

    	$request->validate([
    		'name'=>'required',
    		'price'=>'required',
    		'description'=>'required',
    		'image'=>'image|required'

    	]);
    	//get the image
    		if($request->hasFile('image')){
    			$image=$request->image;
    			$image->move('uploads',$image->getClientOriginalName());


    		}

    	//store the data
    		Product::create([
    			'name'=>$request->name,
    			'price'=>$request->price,
    			'description'=>$request->description,
    			'image'=>$request->image->getClientOriginalName()
    		]);

    	//session for message creation

    		$request->session()->flash('msg','The product is added successfully');
    	//redirect to the next page

    		return redirect('/admin/products/create');

    }


    public function edit($id){
        $product=Product::find($id);
        return view('admin.products.editdetails',compact('product'));
    }



    public function update(Request $request,$id){

        //Find the product

        $product=Product::find($id);

        //Validate the form

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',

        ]);

        //Check the image

        if($request->hasFile('image')){
            //Check the image is inside the folder
            if(file_exists(public_path('uploads/').$product->image)){
                    unlink(public_path('uploads/').$product->image);                

            }

            //Uploading the new image
            $image=$request->image;
            $image->move('uploads',$image->getClientOriginalName());

            $product->image=$request->image->getClientOriginalName();

        }

        //Updating the product

        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$product->image,
        ]);


        //Redirect and session creation 
        $request->session()->flash('msg','The product has been updated');
        return redirect('admin/products');

    }


    public function destroy($id){
        Product::destroy($id);

        session()->flash('msg','Product has been deleted');

        return redirect('/admin/products');
    }

    public function show($id){
        $products=Product::find($id);
        return view('admin.products.details',compact('products'));
    }



    
}
