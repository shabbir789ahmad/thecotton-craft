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

 
    
<div class="card shadow d-flex border  p-0 " >
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('product/upload/admin')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text_color">All Product</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product/upload/admin')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product/upload/admin')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>
<div class="card">
  <div class="card-body">
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
  <select class="form-control subcategory" name="subcategory" id="sub_category">
    
  </select>
 </div>

  <div class="col-md-4">
    <select class="form-control days" name="days">
      <option disabled selected hidden>Sort By Days </option>
      <option value="1">Today</option>
      <option value="2">Last 15 Days</option>
      <option value="3">This Month</option>
    </select>
  </div>
</div>
</div>
</div>

<div class="c mt-3" id="container-wrapper mt-4">
<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4 p-0">
 
  <div class="table-responsive ">
    <table id="example" class="table align-items-center " id="dataTable">
      <thead class="header_color">
       <tr>
         <th>Image</th>
         <th>Name</th>
         <th>Detail</th>
         <th >Price</th>
    
         <th >Stock</th>
         <th >Category</th>
         <th class="text-center">Operation</th>

        </tr>
      </thead>
      <tbody>
        @foreach($product as $show)
        <tr>
          <td class="col-1 ">
         @foreach($show->image as $image)
           <img src="{{asset('uploads/img/'.$image['rimage'])}}" width="100%"> 
          @endforeach</td>
         <td class="col-2">{{ucfirst($show['name'])}}</td>
         <td class="col-3">{{ucfirst($show['detail'])}}</td>
         <td class="col-1">{{ucfirst($show['price'])}}</td>
         <td class="col-1">{{ucfirst($show['total'])}}</td>
          <td class="col-1">
      @if($show['product_category']=='new')
       New Arrival
      @elseif($show['product_category']=='promo')
       {{ucfirst($show['product_category'])}}
     
      
      @endif
     </td>

         <td class="2">
     <div class="b d-flex justify-content-center mt-1">
       <button class="btn btn-xs btn-color text-light promo mr-2" data-id="{{$show['id']}}" style="border-radius: 0 !important;">Apply</button>
       <a href="{{'update-product/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-eye text-success"></i>
       </a>
      
       <a href="{{'delete-product/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"></i>
       </a>
      </div> 
    </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>



 {{ $product->links() }}
  </div>
  </div>
</div>
</div>
</div>





<!-- Modal -->
<div class="modal fade" id="promo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header_color">
        <h5 class="modal-title" id="exampleModalLabel">Put Product In A Specific Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{route('copoun.new.arrival')}}" method="POST">
           @csrf
           @method('PUT')
           <input type="hidden" name="id" id="product_id">
           <label class="font-weight-bold">Apply Category</label>
           <select class="form-control border-secondary" name="product_category" id="product_category">
             <option selected hidden disabled>Apply Category</option>
             <option value="new">New Arrival</option>
             <option value="promo">Special Promo</option>
           </select>

          <div class="discount mt-3" style="display: none;">
            <label class="font-weight-bold">Promo Discount</label>
          <input type="number" name="discount" class="form-control border-secondary"  placeholder="Promo Discount"/>
          </div>

         
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Apply</button>
      </div>
      </form>
    </div>
  </div>
</div>



<form id="sub_form">
  <input type="hidden" name="sub_category" id="product_sub_category">
</form>

<form id="day_form">
  <input type="hidden" name="days" id="product_days">
</form>
  
 @endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('.promo').click(function(){

       $('#promo_modal').modal('show');
       let id=$(this).data('id')
         $('#product_id').val(id);
    });

  $('#product_category').change(function()
  {

    let value=$(this).val();
    if(value=='promo')
    {
  
      $('.discount').css('display','block')     
    }else{
      $('.discount').css('display','none') 
    }
  });


  });
</script>

 @endsection

