<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Detail;
use App\Models\Charge;
class ReturnProductController extends Controller
{
    function index($id)
    {
          $order=Order::
      join('details','orders.id','=','details.order_id')->select('details.product','details.total','details.price','details.quentity','orders.id','details.sub_id','details.product_id')
      ->where('details.order_id',$id)->first();

      $currency=Product::where('id','=',$order['product_id'])->select('currency','discount')->first();
    
      return view('Dashboard.order.order_detail',compact('order','currency'));
    }


    function returnProduct($id,Request $request)
    {
      
        $order=Detail::where('order_id',$id)->first();

        $product=Product::findorfail($request->product_id);
   

        if($order->quentity===1 || $order->quentity==$request->quentity)
        {
                     
            $product->total=$product->total + $request->quentity;
            $product->save();
            Order::where('id',$id)->forceDelete();
            Charge::create([
             
             'return_charges'=>$request->return_charges??null,
              'return_reason'=>$request->return_reason,
              'product_id'=>$request->product_id,
              'quentity'=>$request->quentity,
            ]);
            
            return redirect()->route('admin.deleted.order')->with('success','Product returned Successfully');
        }else
        {
          
            $total=$order->total/$order->quentity;
            $order->quentity=$request->quentity;
            $order->total=$request->total-$total;
            
            
            $product->total=$product->total + $request->quentity;
            
            
            $product->save();
            $order->save();
             Charge::create([
             
             'return_charges'=>$request->return_charges??null,
              'return_reason'=>$request->return_reason,
              'product_id'=>$request->product_id,
              'quentity'=>$request->quentity,
            ]);
            return redirect()->route('admin.deleted.order')->with('success','Product returned Successfully');
    }
}
}
