<?php

namespace App\Http\Controllers;
use App\cart;
use App\product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
//use Cartalyst\Stripe\Stripe;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products=product::all();
        return view('product.index',compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }


    public function addtocart(product $product)
    {
        if(session()->has('cart')){
         $cart= new cart(session()->get('cart'));

       }else{
            $cart = new cart();
       }
       $cart->add($product);
       
       session()->put('cart',$cart);
       return redirect()->route('product.index')->with('success','product was added');
    }

    
    public function showcart()
    {
        if(session()->has('cart')){
         $cart= new cart(session()->get('cart'));

       }else{
            $cart = null;
       }
       
       
       session()->put('cart',$cart);
       return view('cart.show',compact('cart'));
    }

    public function checkout($amount)
    {
        return view('cart.checkout',compact('amount'));
    }

    public function charge(Request $request)
    {
        $charge= stripe::charge()->create([
            'currency'=>'USD',
            'source'=>$request->striptoken,
            'amount'=>$request->amount,
            'description'=>'test from laravel new app',
        ]);
        $chargid=$charge['id'];

        if($chargeid){


            session()->forget('cart');
            return redirect()->route('store')->with('success','payment was done');


        }else{
            return redirect()->back();
        }
    }

    
}
