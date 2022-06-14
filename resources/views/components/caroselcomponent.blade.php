

     <div class="item mx-1">
      <div class="card">
       <div class="hover">
        @if($product->image)
        @foreach($product->image as $img)
         @if($loop->first)
          <a href="{{route('productpage',['id'=>$product['id']])}}"><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top front_image" alt="..." loading="lazy"></a>
         @endif
         @if($loop->last)
          <a href="{{route('productpage',['id'=>$product['id']])}}" ><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top back_image" alt="..." loading="lazy" style="display:none;"></a>
         @endif
        @endforeach
        @endif
        <!--<a href=""><p class="overlay3">New</p></a>  -->
        <i class=" far fa-heart overlay2 fa-lg wishlist" data-count="4b"  data-id="{{$product['id']}}"></i>
        @if($product['product_category']=='promo')
         <p class="overlay5">{{floor(($product['discount'] / $product['price'])*100)}}% off</p>
         @endif
       </div>
       <div class="card-body p-0 pt-1 ">
        <p class="text-center name">{{ucwords($product['name'])}}</p>
         <div class="bottem_text d-flex">
          <p class="m-0 sizes pl-2">
           @for($i=0; $i<5; $i++)
            @if($i<$product['rating'])
             <span class="fa fa-star checked "></span>
            @else
             <span class="fa fa-star"></span> 
            @endif
          @endfor</p>
           <p class="ml-auto m-0 mr-3">{{$product['currency']}}   @if($product['product_discount'])  {{$product['product_discount']}} <span class="text-danger"><del>{{$product['currency']}} {{ $product['price']}}</del></span>@else {{ $product['price']}} @endif</p>
       </div>
      </div>
     </div>
   </div>
