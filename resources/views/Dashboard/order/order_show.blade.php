@extends('Dashboard.admin')
@section('content')
<style type="text/css">
  .dataTables_wrapper .dataTables_filter input{

padding: 1rem 4rem;
border:  1px solid #1E1E2D;
}

.dataTables_wrapper .dataTables_filter label{

font-size: 1.5vw;
font-weight: 700;
}
</style>
<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text_color">All Orders</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('/orders')}}">
    <i class="fas fa-pencil-alt text_color fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('/orders')}}">
     <i class="fas fa-trash-alt text_color fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>




<div class="row mt-4">
  <div class="col-md-4">
   <select class="form-control"  id="main2">
    <option selected="" disabled hidden="" >Sort By Category</option>
    @foreach($main as $m)
  <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
  @endforeach
</select>

  </div>
 <div class="col-md-4">
  <select class="form-control subcategory" name="subcategory" id="sub_category2">
    
  </select>
 </div>

  <div class="col-md-4">
    <select class="form-control days2" name="days">
      <option disabled selected hidden>Sort By Days </option>
      <option value="1">Today</option>
      <option value="2">Last 15 Days</option>
      <option value="3">This Month</option>
    </select>
  </div>
</div>

<div class="c mt-3" id="container-wrapper mt-4">
<div class="card">
 <div class="card-body p-0">
<div class="table-responsive p-0 table-striped">

<table id="example" class="table table-striped">
  <thead class="header_color">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th>Customer</th>
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
    <td class="a">{{ucfirst($show['name'])}}</td>
    <td class="a">{{ucfirst($show['price'])}}</td>
    <td class="a">{{ucfirst($show['total'])}}</td>
    <td>

      <span class="badge  @if($show['order_status']=='Pending') badge-success @elseif($show['order_status']=='Shipped') badge-primary @elseif($show['order_status']=='Enroute') badge-warning @endif ">{{$show['order_status']}}</span>
     <button class="btn btn-xs btn-primary p-0 status" data-id="{{$show['id']}}" data-status="{{$show['order_status']}}">change</button>
    </td>

    <td class="a ">{{ucfirst($show['quentity'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'show-order/'.$show['order_id']}}" class="border shadow  py-2 px-3"><i class="fas fa-eye text-success"></i>
       </a>
       <a href="{{'cancel-order/'.$show['order_id']}}" class="border ml-3 py-2 px-3 btn-danger" onclick="return confirm('Are you sure?')">  
         Cancel
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

  
<form id="sub_form2">
  <input type="hidden" name="sub_category2" id="product_sub_category2">
</form>

<form id="day_form2">
  <input type="hidden" name="days2" id="product_days2">
</form>


<!-- Modal -->
<div class="modal fade" id="change_order_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('change.status')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="id">
        <label>Select Order Status</label>
        <select class="form-control" name="order_status">
          <option>Pending</option>
          <option>Shipped</option>
          <option>Enroute</option>
          <option>Delivered</option>
        </select>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Update </button>
      </form>
      </div>
    </div>
  </div>
</div>

 @endsection

