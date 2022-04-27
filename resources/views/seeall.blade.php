@extends('master.master')
@section("content")
<div class="container-fluid mt-5 ">
 
 <div class="container-fluid mb-4" style="display: flex; justify-content: center;">
 <div class="row" style="width:95%; overflow: hidden;">
    <div class="col-md-3 p-1">
      <select class="form-control sort_by_category"  >
    <option disabled selected hidden>Sort By Category</option>
    @foreach($categories as $category)
      <option value="{{$category['id']}}" @if(request()->category_id==$category['id'])  selected @endif>{{$category['category']}}</option>
    @endforeach
   </select>
    </div>

    <div class="col-md-3 p-1">
      <select class="form-control sort_by_sub_category"  >
    <option disabled selected hidden>Sort By Sub Category</option>

    @foreach($submenues as $menues)
      <option value="{{$menues['id']}}" @if(request()->sub_category_id==$menues['id'])  selected @endif >{{$menues['smenue']}}</option>
    @endforeach
   </select>
    </div>
    
    <div class="col-md-6 p-1">
      <form action="{{route('all.product',['id'=>request()->route()->id])}}" method="GET" class="d-flex">
      <input type="text" name="search" class="form-control border-secondary mr-1">
    
    <button class="btn btn-md  btn-color text-light">Search</button>
    </form>
    </div>
    
  </div>
</div>
<div class="container-fluid mb-4" style="display: flex; justify-content: center;">

  

 <div class="row"  style="width:95%; overflow: hidden;">
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_brand"  >
    <option disabled selected hidden>Sort By Brand</option>
    @foreach($brand as $br)
      <option @if(request()->brand==$br['bname'])  selected @endif>{{$br['bname']}}</option>
    @endforeach
   </select>
  </div>
  <div class="col-md-3 px-1">
   <select class="form-control sort_by_price" >
   
      <option disabled selected hidden>Sort By Price</option>
      <option>1000</option>
      <option>2000</option>
      <option>3000</option>
      <option>4000</option>
      <option>5000</option>
      <option>6000</option>
   
   </select>
  </div>
  <div class="col-md-3 px-1">
   <select class="form-control sort_by_sizes" >
    <option disabled selected hidden>Sort By Sizes</option>
      @foreach($sizes as $size)
      <option value="{{$size['product_size']}}" @if(request()->size2==$size['size_name'])  selected @endif>{{ucfirst($size['size_name'])}}</option>
      @endforeach
   </select>
  </div>
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_new" >
    <option disabled selected hidden>Sort By Newest</option>
      <option value="this" @if(request()->new2=='this')  selected @endif >This Week</option>
      <option value="last" @if(request()->new2=='last')  selected @endif>Last Week</option>
      <option value="month" @if(request()->new2=='month')  selected @endif>This Month</option>
   </select>
  </div>
 </div>
</div>

 <h3 class="text-center ml-3 heading_line">
  
  @if(request()->route()->id==1)

 New Arrival
  @elseif(request()->route()->id==2)
   Special Promos
   @elseif(request()->route()->id==3)
   All Product
   @elseif(request()->route()->id==4)
   Tranding
  @endif
 </h3>
</div>



<div class="row" style="overflow:hidden; width:99%">
	
       @forelse($products as $product)

     <div class="col-md-3 mt-3 mb-5">
       <x-caroselcomponent :product="$product" />
     </div>

     @empty
     <x-messagecomponent message="Product Not Found" />
   @endforelse
	
</div>


<form id="sort_form">
  <input type="hidden" name="brand" id="brand">
</form>

<form id="color_form">
  <input type="hidden" name="size2" id="size2">
</form>
<form id="new_form">
  <input type="hidden" name="new2" id="new2">
</form>
<form id="price_form">
  <input type="hidden" name="price" id="price">
</form>

<form id="category_form">
  <input type="hidden" name="category_id" id="category">
 

</form>
<form id="sub_category_form">
  <input type="hidden" name="sub_category_id" id="sub_category">


</form>

@endsection
@section('script')
<script type="text/javascript">
  $('.sort_by_category').change(function(){
  
  let value=$(this).val();
  $('#category').val(value);
  $('#category_form').submit();
});

$('.sort_by_sub_category').change(function(){
  
  let value=$(this).val();
  $('#sub_category').val(value);
  $('#sub_category_form').submit();
});
</script>
@endsection