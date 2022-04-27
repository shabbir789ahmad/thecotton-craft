@extends('master.master')
@section('content')
<style type="text/css">
  
</style>
<section class=" mt-4 con ">
  <div class="back_img">
    <img src="{{asset('pic/about us background.jpg')}}" width="100%">
    <h4 class="">About Us</h4>
    <div class="link_type">
     <a href="{{url('/')}}">Home</a> /
     <a href="{{url('/about')}}" >About</a>
    </div>
  </div>
</section>
<section class=" mt-5  con bg-light">
<div class="container-fluid justify-content-center">
 <div class="row ml-5" style="width:95%">
    <div class="col-md-6">
     <img src="{{asset('pic/about us side.jpg')}}" width="100%" height="450rem" class="mt-4">
    </div>
    <div class="col-md-6">
     <div class="text_color mt-2">
     <h2 class="">About Us</h2>
    
     <p class="mt-4">The Cotton Craft is a quality conscious company aiming to lead with best products backed by top level service and efficient customer care. We are a team of professionals</p>
     <p>having international exposure and have an insight to match the expectations of our valued consumers. The endeavor is to establish their trust in our products, services, quality, variety, designs, colors combination and durability by providing them with the best products at best prices with a money back guarantee. </p>
     <p>This website is our showcase to present you just a chunk of our products to give you an idea about our approach, range and choices for you to select a better product to décor your home and life with elegance and style.</p>
     </div>
    </div>
  </div>
</div>
</section>

<section class=" mt-5  con bg-light">
<div class="container-fluid justify-content-center">
 <div class="row ml-5" style="width:95%">
  <div class="col-md-6">
     <div class="text_color mt-2">
     <h2 class="">Return and Exchange Policy:</h2>
    
     <p class="mt-4">You have a right to claim return or exchange  within 7 days of your purchase and we shall be pleased to refund or process an exchange maximum within a week of receiving the returned goods.

(Items must be unworn, unwashed, undamaged and unused with all original tags attached for a return to be acceptable)..</p>
     
     </div>
    </div>
    <div class="col-md-6">
     <img src="{{asset('pic/return and exchange policy.jpg')}}" width="80%" height="300rem" class="mt-4 rounded">
    </div>
    
  </div>
</div>
</section>

<section class=" mt-5  con bg-light">
<div class="container w-75">
 <div class="row">
    
    <div class="col-md-6">
     <div class="text_color mt-5">
      <h2 class="">Original Products: </h2>
     <span></span>
     <p class="mb-4 " style="height:7rem;">This has guaranteed that we stand out for the best products at the most competitive prices.  The design, color combination and contrast are carefully chosen to match your esthetics and give you an elegant feeling. The fabric and its texture will give you a premium feel.</p>
       <img src="{{asset('pic/original products.jpg')}}" width="100%" height="400rem" class="rounded">
     
    
     </div>
    </div>
    <div class="col-md-6">
     <div class="text_color mt-5">
      <h2 class="">Shipping and Delivery Policy  </h2>
     <span></span>
     <p class="mb-4" style="height:7rem;">The customer will usually get an order in 4-6 business days.The shipping charges depend upon the size and volume and shall be borne by the customers. Delivery can take longer in remote areas of Pakistan.</p>
       <img src="{{asset('pic/shipping and delivery.jpg')}}" width="100%" height="400rem" class="rounded">
     
    
     </div>
    </div>
  </div>
</div>
</section>

<section class=" mt-5  con bg-light" >
<div class="container-fluid justify-content-center">
 <div class="row ml-5" style="width:95%;margin-top: 10rem;">
  <div class="col-md-6">
     <img src="{{asset('pic/customized services.webp')}}" width="100%" height="400rem" class="mt-4 rounded float-right">
    </div>
  <div class="col-md-6">
     <div class="text_color mt-2">
     <h2 class="">Customized Services: </h2>
    
     <p class="mt-4">We understand that the better the services the greater would be customer satisfaction. Customers stand central in our thoughts and policies. We ensure that your shopping experience at our online store becomes easy, quick and hassle free. This is our commitment that we treat your orders and queries on top priority.</p>
     
     </div>
    </div>
    
    
  </div>
</div>
</section>


<section class=" mt-5  con bg-light">
<div class="container video_width" >
 <div class="row mt-5">
    <div class="col-md-12">
     <div class="text_color mt-5 text-center">
      <h2 class="">Our Promo Video</h2>
      
     <p class="   mb-4">This is our philosophy of business to win customers and establish their trust on our products by matching their expectations and by serving them on international standards. We believe in their satisfaction and understand that only fairness with quality can lead us to position our place in their hearts.</p>
     <div class="border_s"></div>

     <iframe width="100%" height="300rem" src="https://www.youtube.com/embed/wZxjfCNoktc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

       
    
     </div>
    </div>
   
  </div>
</div>
</section>
@endsection