@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('admin/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text_color">All Orders</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
    <i class="fas fa-pencil-alt text_color fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
     <i class="fas fa-trash-alt text_color fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>




<div class="c mt-3" id="container-wrapper mt-4">
<div class="card">
 <div class="card-body p-0">
<div class="table-responsive p-0">

<table class="table" >
  <thead class="header_color">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th >Total</th>
    <th >Status</th>
    <th >Quantity</th>
    <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
   
   @foreach($order as $show)
   <tr>
    <td class="a col-1"><img src="{{asset('uploads/img/'.$show['image'])}}" width="100%"> </td>
    <td class="a">{{ucfirst($show['product'])}}</td>
    <td class="a">{{ucfirst($show['price'])}}</td>
    <td class="a">{{ucfirst($show['total'])}}</td>
    <td><span class="badge badge-success">{{$show['order_status']}}</span>
     
    </td>

    <td class="a ">{{ucfirst($show['quentity'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'return-order/'.$show['order_id']}}" class="border shadow  py-2 px-3 border border-dark">Return
       </a>
     
      </div> 
    </td>
   </tr>
 
         @endforeach
    
  </tbody>
</table>

       </div>

     </div>
   </div>

 {{ $order->links() }}
  </div>
  </div>

  



  
 @endsection
