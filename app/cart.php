<?php

namespace App;
use App\product;
use App\cart;

class cart 
{
    
    public $items = [];
    public $totalqty ;
    public $totalprice ;

       public function __construct($cart=null)
              {

                if($cart){

                    $this->items=$cart->items;
                    $this->totalqty=$cart->totalqty;
                    $this->totalprice=$cart->totalprice;
                }else{

                      
                    $this->items=[];
                    $this->totalqty=0;
                    $this->totalprice=0;  

                }
                
            }
           
                public function add($product){

                    $item=[

                        'title'=>$product->title,
                        'price'=>$product->price,
                        'qty'=>0,
                        'image'=>$product->image,
                    ];
                    if(!array_key_exists($product->id , $this->items)){
                        $this->items[$product->id]=$item;
                        $this->totalqty +=1;
                        $this->totalprice +=$product->price;  
    

                    }else{
                        $this->totalqty +=1;
                        $this->totalprice += $product->price; 
                    }
                    $this->items[$product->id]['qty'] += 1;
                }




              




}                


 
