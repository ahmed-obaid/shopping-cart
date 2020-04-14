@extends('layouts.app')

@section('content')

 

<section>
    <div class="row">
         @foreach($products as $product)
          <div class="col-md-4">
              <div class="card mb-4" >
                 <img class="card-img-top" src="{{$product->image}}" >
                   <div class="card-body">
                      <h5 class="card-title">{{$product->title}}</h5>
                      <p class="card-text"> text to build on the card title and make up the bulk of the card's content.</p>
                      
                      <span>${{$product->price}}</span>
                        <hr>
                      <a href=" {{route('cart_add',$product->id)}} " class="btn btn-primary">buy</a>
                   </div>
             </div>
          
          </div>


          @endforeach
    
    </div>

</section>
@endsection
