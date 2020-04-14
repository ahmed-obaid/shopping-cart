@extends('layouts.app')

@section('content')
 <div class="row">
 @if($cart)
    <div class="col-md-8">
      @foreach($cart->items as $product)
              <div class="card mb-2">
                        <div class="card-body">
                             <h5 class='card-title'>{{$product['title']}}</h5>
                            <div class="card-text">
                               ${{$product['price']}} 
                               
                               <a href='#' class='btn btn-danger btn-sm ml-4'>remove</a>
                               <input type='text' name='qty'id='qty'value={{$product['qty']}}>
                               <a href='#' class='btn btn-secondary btn-sm '>change</a>
                         
                            </div>
                                              
                        </div>
              </div>
 



        @endforeach
        <p>total : $ {{$cart->totalprice}} </p>
        <a href='{{route('cart_checkout',$cart->totalprice )}}' class='checkout'>checkout</a>
    </div>

        <div class="col-md-4">
         
              

       
        
        </div>
 @else
   <p>there no items</p>

  @endif
 
 </div>
@endsection
