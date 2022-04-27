<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
      public function cart()
    {
        return view('cart');
    }
   public function getwishlist()
    {
        return view('wishlist');
    }

    function countCart()
    {
        $cart=session()->get('cart');
        $wishlist=session()->get('wishlist');
       
       if($cart !=null)
       {
        $cart=count($cart);
       }else
       {
        $cart=0;
       }
       if($wishlist !=null)
       {
        $wishlist=count($wishlist);
       }else
       {
        $wishlist=0;
       }

        return response()->json(['cart'=>$cart,'wishlist'=>$wishlist]);
    }
  


    public function addToCart(Request $req)
    {
       $id=$req->id;
        $product = Product::
        join('images','products.id','=','images.image_id')
        ->select('products.name','products.price','products.discount','products.detail','products.id','images.rimage','products.sub_id','products.currency','products.total','products.product_discount')
        ->findorfail($id);
         
        $cart = session()->get('cart', []);
       
        if(isset($cart[$id])) {
           
            $quen=$cart[$id]['quantity']++;
            $cart[$id]['price']*$quen;
            if($product['total'] > $quen)
            {
               
            }else{
                $cart[$id]['quantity']--;
            }
            
        } else {

            $cart[$id] = [
                "sub_id" => $product['sub_id'],
                "name" => $product['name'],
                "stock" => $product['total'],
                "quantity" => 1,
                "price" => $product->price - $product->product_discount,
                "currency" => $product->currency,
                "image" => $req->image,
                "color" => $req->color,
                "size" => $req->size,

            ];
            
        }
          
        session()->put('cart', $cart);
        $cart=session()->get('cart');
        return response()->json(['success', 'Product added to cart successfully!','cart'=>$cart]);
    }
  
   
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success2', 'Cart updated successfully');
        }
    }
  
    
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success2', 'Product removed successfully');
        }
    }

    function wishlist(Request $req)
    {
         $id=$req->id;
         $product = Product::
        join('images','products.id','=','images.image_id')
        ->select('products.name','products.price','products.discount','products.detail','products.id','images.rimage','products.sub_id','products.detail')
        ->findorfail($id);
        $wishlist= session()->get('wishlist',[]);

       
      
            $wishlist[$id]=[
                "sub_id" => $product['sub_id'],
                "name" => $product['name'],
                "ship" => $product['ship'],
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->rimage,
                "color" => $req->color,
            ];
      
         session()->put('wishlist', $wishlist);
        return response()->json('success2');
    }

    function updateWishlist(Request $req)
    {
        if($req->id && $req->quantity)
        {
            $wishlist=session()->get('wishlist');
            $wishlist[$req->id]["quantity"]=$req->quantity;
            session()->put('wishlist',$wishlist);
            session()->flash('success2','Wishlist updated successfully');
        }
 
    }
    function removeWish(Request $request)
    {
       if($request->id) {
            $wishlist = session()->get('wishlist');
            if(isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
           return response()->json('success2');
        }
    }
}
