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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');
Route::get('/products', 'productcontroller@products')->name('product.index');
Route::get('/addtocart/{product}', 'productcontroller@addtocart')->name('cart_add');
Route::get('/shopping-cart', 'productcontroller@showcart')->name('cart_show');
Route::get('/checkout/{amount}', 'productcontroller@checkout')->name('cart_checkout');
Route::post('/charge', 'productcontroller@charge')->name('cart_charge');