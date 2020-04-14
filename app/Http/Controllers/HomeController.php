<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( )
    {

       

        return view('home');
    }



    public function store()
    {
         
       // $latestproducts=product::latest()->take(3)->get();
        $latestproducts=product::orderby('id','asc')->paginate(3);
        return view('store',compact('latestproducts' ));
    }
}
