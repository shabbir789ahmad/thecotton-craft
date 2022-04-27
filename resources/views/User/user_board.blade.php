@extends('master.master')
@section('content')


<div class="container  mt-5">
  <div class="d-flex">
  <p class="font-weight-bold">Your Orders</p>
   <a href="{{url('/')}}" class="ml-auto"> <button class="btn btn-check btn-lg text-light rounded ml-auto"> Continue Shopping</button></a>
</div>
  <div class="row">
    @foreach($order as $pro)
    <div class="col-md-4 mt-3">
      <div class="card shadow">
 
        <img  src="{{asset('uploads/img/'.$pro['image'])}}" class="card-img-top" alt="..."  >
      
         
    
     <div class="card-body">
      <h6 class="card-title name">{{$pro['name']}}<span class="float-right ">${{$pro['price']}}  </span></h6>
       
         <a href="{{url('order-track/'.$pro['id'])}}"><button class="btn btn-lg btn-check rounded text-light py-3">Track order</button></a>
        </div>
    </div>
    </div>
@endforeach
  </div>
 
   



</div>

@endsection