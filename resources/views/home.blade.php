@extends('master.master')
@section("content")
<title>Home</title>

  <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      @foreach($slider as $slide)
      
      <div class="carousel-item  @if($loop->first) active @endif caro" >
        <a href="{{url('product/' .$slide['category_id'])}}" style="text-decoration:none;color: #fff;">
        <img class="d-block caro w-100" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" loading="lazy" ></a>
        <!-- <div class="linear-gradient">.</div> -->
        @if($slide['show']==1)
        <div class="header_text text-center">
          <p class="animate__animated animate__bounce p">{{$slide['tag']}}</p>
          <h4 class="animate__animated animate__backInLeft ">{{$slide['heading']}}</h4>
          <p class="p2 animate__animated animate__backInUp mb-3">{{$slide['detail']}} </p>
          <button class="btn btn-lg d-none d-sm-block d-md-block  animate__animated animate__backInUp text-light">Shop Now</button>
        </div>
        @endif
      </div>
      
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



  <div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line">NEW ARRIVALS
 </h3>
 
</div>

<div class="container-fluid pb-5" style="display:flex; justify-content: center; flex-direction: column;background-color: #F1E3FF;">
  @php $id=1 @endphp
  @php $ids=route('all.product',['id'=>$id]) @endphp
  <x-buttoncomponent :id="$ids" />
  
  <div class="owl-carousel owl-theme ml-2"  style="width:99%;">
     


   
   @foreach($products2 as $product)
     
     @if($product['product_category']=='new')
       <x-caroselcomponent :product="$product" />
    @endif
   @endforeach
 
 </div>
</div>
  
<div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line">All Categories
 </h3>
</div>  
<div class="container-fluid mt-4 mb-5" style="display:flex; justify-content: center;flex-direction: column;background-color: #F1E3FF;">
 
     @php $ids=route('all.categories') @endphp
  <x-buttoncomponent :id="$ids" />
 <div class="owl-carousel owl-theme ml-2"  style="width:99%; ">
 


@foreach($categories as $category)
 <x-categorycomponent :category="$category"/>
@endforeach
</div>
</div>



  

<div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line"> Special Promos
 </h3>
</div>

<div class="container-fluid " style="display:flex; justify-content: center; flex-direction: column;background-color: #F1E3FF;">
  @php $id=2 ; @endphp
   @php $ids=route('all.product',['id'=>$id]) @endphp
  <x-buttoncomponent :id="$ids" />
  <div class="owl-carousel owl-theme ml-2"  style="width:99%;">
     
  @foreach($products as $product)
  @if($product['product_category']=='promo')

   <x-caroselcomponent :product="$product" />

  @endif
   @endforeach
 </div>
</div>

<div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line"> All Product
 </h3>
</div>

<div class="container-fluid " style="display:flex; justify-content: center; flex-direction: column;background-color: #F1E3FF;">
  @php $id=3 ; @endphp
   @php $ids=route('all.product',['id'=>$id]) @endphp
  <x-buttoncomponent :id="$ids" />
  <div class="owl-carousel owl-theme ml-2"  style="width:99%;">
     
  @foreach($products as $product)
  
   <x-caroselcomponent :product="$product" />
  
   @endforeach
 </div>
</div>




<div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line">TRENDING
 </h3>
</div>

<div class="container-fluid mt-4" style="display:flex; justify-content: center; flex-direction: column;background-color: #F1E3FF;">
  @php $id=4 ; @endphp
  @php $ids=route('all.product',['id'=>$id]) @endphp
  <x-buttoncomponent :id="$ids" />
  <div class="owl-carousel owl-theme ml-2"  style="width:99%;">
     
  @foreach($products as $product)
  @if($product['rating'] >= 1)
   <x-caroselcomponent :product="$product" />
   @endif
   @endforeach
 
 </div>
</div>

<div class="container-fluid mt-5 mb-5"> 
 <h3 class="text-center ml-3 heading_line">WHY SHOP WITH US
 </h3>
</div>
<div class="container-fluid mt-3 mb-5 " style="overflow:hidden;background: #F1E3FF;">
  <div class="row mt-5 mb-5">
    @foreach($shops as $shop)
   <div class="col-md-3">
    <div class="card rounded card_hover">
     <div class="card-body rounded d">
      <div class="images " style="width:20%;height: rem; object-fit: cover;">
       <img src="{{asset('uploads/img/'.$shop['image'])}}" width="100%" >
     </div>
       <h4 class="mt-2">{{ucfirst($shop['title'])}}</h4>
       <p class="text-center">{{ucfirst($shop['text'])}}</p>
     </div>
    </div>
   </div>
   @endforeach
  </div>

</div>
<!-- <div class="container-fluid text-center" style="margin-top: 10%; margin-bottom: 8%;">
 
 <h3 class=" heading_line mt-5 mb-3">Newsletter
 </h3>
 <p class="mt-3 mb-3">Subscribe to our newsletter and be the first to receive the latest fashion news, promotions and more!</p>
 <div class=" mt-4" style="display:flex;justify-content: center;" >
 <div class="input-group mb-3 text-center" style="width:50%">
  <input type="text" class="form-control py-4" placeholder="Subscribe Or Newsletter" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-dark px-5" style="background-color: #000000;">Subscribe</button>
  </div>
</div>
 </div>
</div> -->


  @endsection 
  @section('script')
@parent

<script type="text/javascript">
  
 


</script>

  @endsection 