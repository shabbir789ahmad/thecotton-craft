<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Dropdown;
use App\Models\Category;
use App\Mail\OrderMail;
use App\Models\Ship;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

  function check()
  {
    
      $cities=Ship::select('city','shipping_cost')->get();
      return view('checkout',compact('cities'));
    
  }
    function order(Request $req)
    {

        $req->validate([
          'name' =>'required',
         
          'phone' =>'required',
          'address' =>'required',
          'country' =>'required',
          'city' =>'required',
          'payment' =>'required',
          'product' =>'required',
          'image' =>'required',
          
        ]);
      
        DB::Transaction(function() use($req)
        {
         
         $order=Order::create([
         'name' => $req->name,
         'email' =>  $req->email,
         'address' =>  $req->address,
         'phone' =>  $req->phone,
         'country' =>  $req->country,
         'city' =>  $req->city,
         'zip' =>  $req->post_code ?? null,
         'payment' =>  $req->payment,
          'user_id' =>  Auth::user()->id??null,
       ]);
   
       $count=sizeof($req->product);
       for($i=0; $i < $count; $i++)
       {

        $data=Detail::create([
          'product'=> $req->product[$i],
          'image'=> $req->image[$i],
          'price'=> $req->price[$i],
          'quentity'=> $req->quentity[$i],
          'sub_id'=> $req->sub_id[$i],
          'color'=> $req->color[$i],
          'size'=> $req->size[$i],
          'order_status'=> 'Pending',
          'order_id'=> $order->id,
           'total' => $req->total,
           'product_id' => $req->product_id[$i],
        ]);

        Product::where('id',$req->product_id[$i])->decrement('total');
       }

         if($data)
         {
            $req->session()->forget('cart');
            
         }
          //$this->orderConform($order,$data);
        });
        
        if(Auth::user())
        {
          return redirect()->route('user.dashboard')->with('success','Order Completed');
        }else
        {
          return redirect()->route('success')->with('success','Order Completed');
        }
        
      
      
    }

  

    function orderConform($order, $detail)
    {
      Mail::to($order->email)->send(new OrderMail($order,$detail));
    }

    function getOrder(Request $req)
    {
      
     $main=Category::all();

     $day='';
     $sub2='';
     if($req->get('days2') !== Null)
     {
        $day=$req->get('days2');
     }

     if($req->get('sub_category2') !== Null)

     {
        $sub2=$req->get('sub_category2');
     }
     
      $query=Order::join('details','orders.id','=','details.order_id')
      ->select('details.id','details.order_id','details.product','details.price','details.total','details.quentity','details.order_status','details.image','orders.name')
      ->where('order_status','!=','delivered')->orderBy('orders.created_at')
      ->withoutTrashed();
      
      if($sub2)
       {
        $query=$query->where('details.sub_id',$sub2);
        }
  
        if($day==1)
       {
        $query=$query->whereDate('orders.created_at','>=',Carbon::today());
        }
        if($day==2)
       {
        $query=$query->where('orders.created_at','>=', Carbon::now()->subdays(15));
        }

        if($day==3)
       {
        $query=$query->whereMonth('orders.created_at','>=', Carbon::today()->month);
        }



     $order=$query->paginate(10);

 
      return view('Dashboard.order.order_show',compact('order','main'));
    }

   function delivered()
    {
      $order=Order::
      join('details','orders.id','=','details.order_id')->select('details.id','details.order_id','details.product','details.price','details.total','details.quentity','details.order_status','details.image')
      ->where('order_status','delivered')->paginate(10);
     
      return view('Dashboard.order.order_deliver',compact('order'));
    }
   
    function cancelOrder($id)
    {
      
       $order=Order::findorfail($id);

       $order->delete();
       return redirect()->back()->with('success','Order Canceled');
    }
    function showOrder($id)
    {
     
      $order=Order::
      join('details','orders.id','=','details.order_id')
      ->where('orders.id',$id)->first();
      $currency=Product::where('sub_id','=',$order['sub_id'])->select('currency')->first();
     // dd($order);
      return view('Dashboard.order.print',compact('order','currency'));
    }
   
    function status(Request $req)
    {
      $order=Detail::findorfail($req->id);
      $order->order_status=$req->order_status;

      $order->save();
      return redirect()->back()->with('success','Status Updated');
    }

    function deletedOrder()
    {
      $order=Order::
      join('details','orders.id','=','details.order_id')->select('details.id','details.order_id','details.product','details.price','details.total','details.quentity','details.order_status','details.image')
      ->onlyTrashed()->paginate();
       //dd($order);
      return view('Dashboard.order.order_cancel',compact('order'));
    }

    function restoreOrder($id)
    {
      $order=Order::
      withTrashed()->
      findorfail($id)->restore();
      return redirect()->back()->with('success','Order Restored');
    }


    function destroy($id)
    {
      
      $order=Order::onlyTrashed()->findorfail($id);

      $order->forceDelete();
      return redirect()->back()->with('success','Order Deleted Permanently');
    }

}
