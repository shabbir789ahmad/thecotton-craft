@extends('master.master')
@section('content')
 <title>Product Detail</title>

<div class="container  mt-3" style="overflow:hidden">
  <div class="card">
    <div class="card-body">
  <div class="row ">
   <div class="col-md-6  p-0 float-right">
     @foreach($images as $d)
     @if($loop->first)

        <img id="mimg" src="{{asset('uploads/img/' .$d['rimage'])}}" class="block__pic imgs mt-3 rounded shadow"  data-title="Red Valentino" data-help="Используйте колесико мыши для Zoom +/-">
   
     @endif
     @endforeach            
        <div class=" details-images2 border">
        @foreach($images as $d)
        <div class="ml-1" style="display: inline-block;" onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" height="150rem" width="130rem" data-src="{{$d['rimage']}}" class="changepic  mt-1 rounded border"  >
       </div>
       @endforeach
      </div>
  </div>
  <div class="col-md-6">

      
       <div class=" d-flex mt-3" >
        <h5 class=" ">{{ucfirst($detail['name'])}}</h5>
        <div class="d-flex ml-auto">
          <!-- <i class="fa-solid fa-share-nodes fa-lg pr-3 open_share"></i> -->
         
         <i class=" far fa-heart fa-lg text-danger wishlist" data-id="{{$detail['id']}}" ></i>
        </div>
       </div>
       <div class="item_pri">
        <div class="icon2 d-flex  ">
     <p class="pt-0 "> 
       @for($i=0; $i<5; $i++)
       @if($i<$detail['rating'])
           <span class="fa fa-star checked fa-xs"></span>
       @else
          <span class="fa fa-star fa-xs"></span>
       @endif
       @endfor
     </p>
     <p>({{$count}})Review</p>
   </div>
         
       </div>
       <p class="p-name"> @if($detail['product_discount'] ) {{$detail['currency']}} {{ $detail['product_discount']}}.00 
       
        <span class="text-danger">{{$detail['currency']}} <del>{{$detail['price']}}.00</del></span>@else {{$detail['currency']}}  {{$detail['price']}} @endif</p>
     

       @if($detail['detail'])
       <p class="p_detail m-0" style="word-wrap:wrap;width: 100%;">{{ucfirst($detail['detail'])}}</p>
        @endif

        <ul class="pl-0 " style="list-style-type: circle;">

          @foreach($point_detail as $point)
          @if($point['detail'] != null)
        <li class="d-flex" style="word-wrap: Wrap; overflow:hidden; width:90%;color: #495057; font-size: 1vw; list-style-type: circle;"><i class="fas fa-check-circle text-success mt-1"></i>      {{ucfirst($point['detail'])}}</li>
        @endif
        @endforeach
        </ul>
        
      
      
      
    
      <label for="" class="font-weight-bold mt-4">
              Select Color<span class="text-danger">*</span>
            </label>
               <div class="all_checkbox ">
                @foreach($color as $s)
                 <div type="button" class="input_checkbox ml-3 p-2 mt-2" style="background-color:{{$s['color']}};">
                  <label class="ok"></label>
                  <input type="checkbox" name="color" value="{{$s['color']}}" class="check_btn" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                      @endforeach
                </div>
        <span id="select_color_error" class="text-danger"></span><br>
  

@if(count($size))
 <label for="" class="font-weight-bold">
              Select Size<span class="text-danger">*</span>
            </label>
               <div class="all_checkbox2">
                @foreach($size as $s)

                 <div  class="input_checkbox2 ml-3  " >
                  <label>{{ucfirst($s['size'])}}</label>
                  <input type="checkbox" name="size" value="{{$s['size']}}" class="check_btn2"  >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                    @endforeach
                </div>
<span id="select_size_error" class="text-danger"></span><br>
@else

@endif

@if($detail['total'] > 4)
  <i class="fa-solid fa-cubes text-warning fa-xl">  </i>  In Stock
@else
  <i class="fa-solid fa-cubes text-warning fa-xl"></i>  Only {{$detail['total']}} Pieces Left In Stock

@endif  
  <div class="d-flex">
   

 

      <button class="btn   text-light btn-block text-light  mr-3 rounded" style="height:3rem;width: 15rem; margin-top: 5%; background-color: #580631;"  id="buy_now">Buy Now</button>
                


    
   
   <button class="btn  btn-color  text-light rounded ml-1 add-to-cart" data-id="{{$detail['id']}}" style="height:3rem;width: 14rem; margin-top:5%">Add To Cart</button>
 
 
   
  
 
</div>
 <div class="social_icon mt-4"><h4 class="font-weight-bold">Like Us On</h4>
        @foreach($links as $link)
       <a href="{{$link['facebook']}}"><i class="fa-brands fa-facebook-f "></i></a>
       <a href="{{$link['twitter']}}"><i class="fa-brands fa-twitter "></i></a>
       <a href="{{$link['instagram']}}"><i class="fa-brands fa-instagram"></i></a>
       <a href="{{$link['linked']}}"><i class="fa-brands fa-youtube"></i></a>
       @endforeach
      </div>
      </div>
     </div>

   </div>
</div>
</div>
<hr>

<div class="container-fluid mt-5 mb-5" style="display:flex; justify-content: center;">
  <div class="review"  style="width:95%;">
    <div class="review_with_form_button">
      <div class="dummy">
      <h2 class="font-weight-bold  ">Customer Reviews</h2>
     <div class="icon2 d-flex  ">
     <p class="pt-0 "> 
       @for($i=0; $i<5; $i++)
       @if($i<$detail['rating'])
           <span class="fa fa-star checked fa-xs"></span>
       @else
          <span class="fa fa-star fa-xs"></span>
       @endif
       @endfor
     </p>
     <p>({{$count}})Review</p>
   </div>
    
       </div>
      
         <button class="btn-color btn text-light " id="write_a_review">Write a Review</button>
        
         </div>


         <div class="review_form">
           <form class="" action="{{url('review')}}" method="Post" class="form_hidden">
    @csrf
     
     <div class="row">
      <div class="col-md-6">
        <label class="mt-3">Name</label>
       <input type="text" name="uname" placeholder="Name" class="form-control  border border-secondary py-4">
       <span class="text-danger">@error ('uname') User name Required @enderror</span>
      </div>
      <div class="col-md-6">
        <label class="mt-3">Email</label>
       <input type="text" name="email" placeholder="Email" class="form-control  border border-secondary py-4">
     <span class="text-danger">@error ('email') Email is Required @enderror</span>
      </div>

      <div class="col-md-6">

       <div class="wrapper_start">
  <input type="checkbox" id="st1" name="rating" value="5" />
  <label for="st1" class="st"></label>
  <input type="checkbox" id="st2" name="rating" value="4" />
  <label for="st2" class="st"></label>
  <input type="checkbox" id="st3"  name="rating" value="3" />
  <label for="st3" class="st"></label>
  <input type="checkbox" id="st4" name="rating" value="2" />
  <label for="st4" class="st"></label>
  <input type="checkbox" id="st5" name="rating" value="1" />
  <label for="st5" class="st"></label>
</div>
      </div>
    </div>
     
     
     <input type="hidden" name="review_id" value="{{$detail['id']}}" class="form-control ">
     <label class="">Message</label>
     <textarea class="form-control mt-2 border border-secondary" name="message" rows="5" placeholder="Your Message"></textarea>
     <span class="text-danger">@error ('message') {{$message}}@enderror</span><br>
     <button  class="btn btn-color text-light float-right mt-4">Submit Review </button>
   </form>
         </div>

    
      <div class="card">
      <div class="card-body">
        @if(count($review)>0)
        @foreach($review as $review)
          <div class="row border border-bottom mt-2">
            
              @php $profile=''; @endphp
             
              <div class="col-md-2 text-center" style="display:flex;align-items: center; justify-content: center;">
                 @if($review['profile']==null)
                   <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid mt-3" width="45%" />
                   @else  
                     <img src="{{asset('uploads/img/' .$review['profile'])}}" class=" image_round" width="30%" />
                 @endif
                
              </div>
              <div class="col-md-10">
                  <p class="mb-2 mt-2">
                    <strong>{{ucfirst($review['uname'])}}</strong>
                      
                      <x-reviewcomponen2 :detail="$detail" />

                 </p>
                 <div class="clearfix"></div>
                  <p>{{$review['message']}}</p>
                  <p>
                     <!--  <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                      <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a> -->
                 </p>
              </div>
          </div>
          @endforeach

          @else

           <p>Be The First To Review This Product</p>
          @endif  
      </div>
  </div>
    
    </div>
  </div>


<div class="container-fluid mt-5 mb-5">
 
 <h3 class="text-center ml-3 heading_line">Related Products
 </h3>
 
</div>

<div class="container-fluid pb-5" style="display:flex; justify-content: center; flex-direction: column;background-color: #F1E3FF;">
 

  @if(count($detail2) > 0)
  <div class="owl-carousel owl-theme ml-2"  style="width:99%;">
     @foreach($detail2 as $product)
   <x-caroselcomponent :product="$product" />
 @endforeach

 </div>
  @else
 <x-messagecomponent message="Product Not Found" />
 @endif
 
 </div>
</div>

     




<!-- direct -->
<div class="modal fade" id="cart_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cart_modal_data">
       
      </div>
      <div class="modal-footer">

        <a href="{{url('cart')}}"><button type="button" class="btn btn-color text-light" >Go To Cart</button></a>
        <a href="{{route('checkout')}}"><button type="button" class="btn text-light" style="background-color: #580631">CheckOut</button></a>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="buy_now_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" >
        <form method="POST" action="{{url('chechout2')}}" enctype="multipart/form-data" id="form_reset">
          @csrf
         
         <div class="row">
         
            <x-sameinputcomponent />

            <div class="col-md-6">
               <label class="mt-2"><i class="fas fa-building"></i> City</label>
               <select class="form-control" name="city" id="city2">
                @foreach($ships as $ship)
                 <option value="{{$ship['shipping_cost']}}">{{ucfirst($ship['city'])}}</option>
                 @endforeach
               </select>
               <span>@error ('city') {{$message}} @enderror</span>
            </div>

          
          <div class="col-md-6">
            <input type="checkbox" name="payment" value="cash on delivery"  class="mt-3 mt-sm-3 mt-md-5 mb-5 mb-sm-5 mb-sm-0" required checked>
          <span>Payment On Delivery</span>
           <span class="text-danger">@error ('payment') {{$message}} @enderror</span>
        </div>
      

        <div class="col-md-6">

        <div class=" border">
       <p class=" mt-2 ">SubTotal:<span class="float-right"> {{$detail['product_discount']-$detail['discount'] }}</span></p>
       <p class=" mt-2 ">Shiping Cost:<span class="float-right" id="shipping_cost2"> </span></p>
       <h6 class=" mt-2 ">Grand Total:<span class="float-right" id="grand_total2"> </span></h6>
       </div>
        </div>

        <div class="col-md-6">
          <div class="row mt-1">
         <div class="col-md-4 col-4">
          @foreach($images as $d)
           @if($loop->first)
          <img src="{{asset('uploads/img/' .$d['rimage'])}}" width="100%" height="100rem">
          @endif
          @endforeach
         </div>
         <div class="col-md-8 col-8">
           <p class="overlayi mb-0">{{ucwords($detail['name'])}}</p>
           <p class="mb-0 ">Color: <span id="color_show"></span> <span class="float-right">Size: <span id="size_show"></span></span></p>
           <p class="mb-0 "></p>
           <p class=" mb-0">{{$detail['currency']}}: {{ucwords($detail['product_discount']-$detail['discount'])}} <span class="float-right">
           <p class=" mb-0 d-flex">
            <button class="btn btn-xs btn-info" type="button" id="minus">-</button><input type="number" value="1" name="quentity" class="form-control w-50" id="quentity" data-stock="{{$detail['total']}}"><button class="btn btn-xs btn-info" type="button" id="add">+</button></p>
           
           
         </div>
        </div>
        </div>
          </div>
          <input type="hidden" name="product_id[]" value="{{$detail['id']}}">
            <input type="hidden" name="product[]" value="{{$detail['name']}}">
            <input type="hidden" name="price[]" value="{{$detail['product_discount']}}">
             @foreach($images as $d)
              @if($loop->first)
               <input type="hidden" name="image[]" class="image" value="{{ $d['rimage']}}">
         @endif
                          @endforeach 
                   
                   <input type="hidden" name="sub_id[]" value="{{ $detail['sub_id']}}">
                   <input type="hidden" name="detail[]" value="{{ $detail['detail']}}">
                   <input type="hidden" name="color[]" id="buy_now_color">
                   <input type="hidden" name="size[]" id="buy_now_size">
                   <input type="hidden" id="total2" value="{{$detail['product_discount']}}">
                   <input type="hidden" name="total" id="total_input2" value="{{$detail['product_discount']-$detail['discount']}}">
                  
      </div>
     
     <div class="modal-footer">
       <button type="submit" class="btn text-light order_now" style="background-color: #580631" >Order Now</button>
        </form>
      </div>

    </div>
  </div>
</div>








<script type="text/javascript">
    
    function changepic(a)
    {
      document.querySelector(".imgs").src=a.children[0].src;
      
      
    }


 

</script>

 
@endsection

@section('script')
@parent
<script type="text/javascript">

 $('.changepic').click(function(){

      let value=$(this).data('src');
      $('.image').val(value)
    })


//this page reload function 
//is defined in master page
reloadPage();


  
 $('#city2').change(function(){
 
        let value=$(this).val();
        let quentity=$('#quentity').val();
        $('#shipping_cost2').text(value)
        let grnd_total=$('#total2').val();
        grnd_total=grnd_total*quentity;
        grnd_total=parseInt(grnd_total )+ parseInt(value);
   
        $('#grand_total2').text(grnd_total)
        $('#total_input2').val(grnd_total)
    });

$(".add-to-cart").click(function (e) {
        e.preventDefault();
  
        const id = $(this).data('id');
        const color = $('.check_btn:checked').val();
        const size = $('.check_btn2:checked').val();

       

        $.ajax({
            url: '{{ route('add.to.cart') }}',
            method: "POST",
            dataType : 'json',
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                color: color, 
                size: size, 
                image:$('.image').val(),
             
            },
           
        }).done(function(res){
           let ph;
           $("#cart_model").modal('show');
           $('#cart_modal_data').empty();
          
           
           $.each(res.cart,function(index,value){
          
             ph = baseURL + "uploads/img/" + value.image;
            
            $('#cart_modal_data').append(`
               
               <div class="row mt-3 afdf">
                <div class="col-md-4">
                 <img src="${ph}" alt="product image" width="100%"; height="130rem" />
                </div>
                <div class="col-md-8">
                <h6 class="text-dark font-weight-bold">${value.name}</h6>
                 <p style="color:3121212;">Quentity: ${value.quantity}</p>
       <p class="mb-2">${value.currency}: ${value.price} <span class="float-right"><button class="btn btn-danger btn-xs mt-3 remove-from-cart" data-id="${index}">
     <i class="fas fa-trash-alt"> </i>
       </button></span></p>
                </div>
               </div>

                `);

           });

          countcart()
          
               
      });
    });
 
$(document).on('click','#add',function(){

let value=$('#quentity').val()
let stock=$('#quentity').data('stock')

      if(stock > value)
      {
        value++
      }
 
     $('#quentity').val(value)
       
        let ship_cost=$('#city2').val();
        let grnd_total=$('#total2').val();
        grnd_total=grnd_total*value;
         grnd_total=grnd_total+parseInt(ship_cost)

         $('#shipping_cost2').text(ship_cost)
        $('#grand_total2').text(grnd_total)
        $('#total_input2').val(grnd_total)
});
$(document).on('click','#minus',function(){

let value=$('#quentity').val()
     value--;
     if(value<=0)
     {
      value=1;
     
     }
     $('#quentity').val(value)

        let ship_cost=$('#city2').val();
       let grnd_total=$('#total2').val();
        grnd_total=grnd_total*value;
      
        grnd_total=grnd_total+parseInt(ship_cost)

         $('#shipping_cost2').text(ship_cost)
        $('#grand_total2').text(grnd_total)
        $('#total_input2').val(grnd_total)
});

//buy now modal open
 $('#buy_now').click(function(){

  
   const color = $('.check_btn:checked').val();
        const size = $('.check_btn2:checked').val();

      

        
        $('#buy_now_color').val(color);
        $('#buy_now_size').val(size);
        $('#buy_now_model').modal('show');
        $('#color_show').text(color);
        $('#size_show').text(size);
 });

 $('#city').change(function(){

   let id=$(this).val()
   alert(id)
 });

 $('.open_share').click(function(){

  $('#myForm').css('display','block')

 });


 initialValue2()
function initialValue2()
{
   let ship_cost=$('#city2').val();
   let sum2=$('#total2').val()

   sum2=parseInt(sum2) + parseInt(ship_cost);
       
       $('#shipping_cost2').text(ship_cost)
        $('#grand_total2').text(sum2)
        $('#total_input2').val(sum2)
}

$('#write_a_review').click(function(){

  $('.review_form').toggle();
});

$('.st').click(function(){

$(this).prop('checked',true);
$(this).siblings('.st').prop('checked',false)
});


</script>
@endsection