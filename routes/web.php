<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin ROutes
Route::prefix('admin')->group(function(){

	Route::middleware('auth:admin')->group(function(){

		Route::get('/','DashboardController@index');

//Products
Route::resource('/products','ProductController');

//Orders
Route::resource('orders','OrderController');

Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
Route::get('/pending/{id}','OrderController@pending')->name('order.pending');

//Users
Route::resource('/users','UserController');

//Logouts

Route::get('logout','AdminUserController@logout');
	});

	//Login Admin

Route::get('/login','AdminUserController@index');

Route::post('/login','AdminUserController@store');
	
});


//Front end routes


Route::get('/','FrontHomeController@index');

Route::get('/user/register','FrontRegistrationController@index');

Route::post('/user/register','FrontRegistrationController@store');

Route::get('/user/profile',function(){
	return 'Welcome-User';
});

//Front User login

Route::get('/user/login','FrontLoginController@index');

Route::post('/user/login','FrontLoginController@store');

//Front User logout

Route::get('/user/logout','FrontLoginController@logout');

//User Profile

Route::get('/user/profile','FrontUserProfileController@index');

//User order details routes

Route::get('/user/orderdetails/{id}','FrontUserProfileController@show');

//Cart

Route::get('/cart','CartController@index');

Route::post('/cart','CartController@store')->name('cart');

Route::get('/empty',function(){
	Cart::instance('default')->destroy();
});

Route::delete('cart/remove/{product}','CartController@destroy')->name('cart.destroy');

Route::post('/cart/saveLater/{product}','CartController@saveLater')->name('cart.saveLater');

//save for Later

Route::delete('/cart/saveLater/remove/{product}','CartSaveLaterController@destroy')->name('saveLater.destroy');

Route::post('/cart/movetoCart/{product}','CartSaveLaterController@movetocart')->name('cart.movetocart');

//Checkout process

Route::get('/checkout','CheckOutController@index');
Route::post('/checkout','CheckOutController@store')->name('checkout');




