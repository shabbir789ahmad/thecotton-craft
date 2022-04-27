@extends('master.master')
@section('content')
<title>Product</title>
<div class="container-fluid mt-4" style="display: flex; justify-content: center;">
 <div class="row"  style="width:95%; overflow: hidden;">
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_brand"  >
    <option disabled selected hidden>Sort By Brand</option>
    @foreach($brand as $br)
      <option>{{$br['bname']}}</option>
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
      <option value="{{$size['product_size']}}">{{ucfirst($size['size_name'])}}</option>
      @endforeach
   </select>
  </div>
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_new" >
    <option disabled selected hidden>Sort By Newest</option>
      <option value="this">This Week</option>
      <option value="last">Last Week</option>
      <option value="month">This Month</option>
   </select>
  </div>
 </div>
</div>
<!-- 
<div class="wrapper3">
      
  <nav id="sidebar" class="shadow border-right">
 
    <p class=" filter3 ml-3 mt-5">By Brand <span class="float-right mr-2">See All</span></p>   
<div class="top_cat ml-3 filter">
  <ul class="list-unstyled">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" >
        <i class="fas fa-caret-right mr-2 fa-lg"></i>{{$br['bname']}}
      </a>
    </li>
    @endforeach
      
  </ul>
</div>
       <hr class="ml-3 bg-dark ">
     <div class="filter3">
      <p class="  filter3 ml-3 ">Sort By <span class="float-right mr-2">See All</span></p>
</div>
<div class="top_cat ml-3">
  <ul class="list-unstyled ">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" class="filter2">
       <span class="label">
        <input type="checkbox" name="filter_brand" >
        <label class="ml-2"> {{$br['bname']}}</label>
       </span>
      </a>
    </li>
    @endforeach
  </ul>
</div>
     <hr class="ml-3 bg-dark ">
     <div class="filter">
      <p class="  filter3 ml-3">Color <span class="float-right mr-2">See All</span></p>
      <div class="top_cat">
      <ul class="list-unstyled fl ml-3">
      
      
     
          </ul>
        </div>
       </div>
  
     
    



     <div class="filter">
      <p class="  filter3 ml-3 ">Price<span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
    
       <li>
      <a href="javascript:void(0)" onclick="price_filter()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price1" value="1000">
       <label class="ml-2"> Under 1000Rs </label>
     </span>
     </a>
     </li>
    
           <li>
      <a href="javascript:void(0)" onclick="price_filter2()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price2" value="2000">
       <label class="ml-2"> Under 2000Rs </label>
     </span>
     </a>
     </li>
          <li>
      <a href="javascript:void(0)" onclick="price_filter3()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price3" value="3000">
       <label class="ml-2"> Under 3000Rs </label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="price_filter4()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price4" value="3100">
       <label class="ml-2"> Under 3000Rs </label>
     </span>
     </a>
     </li>
      </ul>
   </div>
     
   
     
<hr class="mt-4 ml-4 bg-dark">
<div class="filter">
      <p class="  filter3 ml-3 ">New Arrival <span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
     
       <li>
      <a href="javascript:void(0)" onclick="newarrival()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="n" value="this">
       <label class="ml-2"> This Week</label>
     </span>
     </a>
     </li>
       <li>
      <a href="javascript:void(0)" onclick="newarrival2()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne" value="last">
       <label class="ml-2"> Last Week</label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="newarrival3()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne3" value="month">
       <label class="ml-2"> This Month</label>
     </span>
     </a>
     </li>
      </ul>
      </div>        

  </nav>
 -->
       
<!-- <div id="content">

   <nav class="navbar mb-0 navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <button type="button" id="sidebarCollapse" class="btn btn-info d-block d-md-none">
      <i class="fas fa-align-left "></i>
                        <span>Filter</span>
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
              </div>
             </div>
   </nav> -->


<div class="container-fluid mt-4 mb-5" style="overflow: hidden;">
 <div class="row ml-1"  style="width:100%;">
  @forelse($product as $pro)
    <div class="col-sm-3 p-1 col-12 col-md-3 col-lg-3 mt-3">
      <x-caroselcomponent :product="$pro" />
    
   </div>

   @empty

  <x-messagecomponent message="Product Not Found" />
  @endforelse
  {{ $product->links() }}
 </div>
</div>




           
  <!--  </div>
    </div> -->

   
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
@endsection