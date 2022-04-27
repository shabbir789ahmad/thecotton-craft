@extends('master.master')
@section('content')
<title>Check Out</title>
<div class="fy mb-5 "  style="background-color:#F5F5F5">
<p class=" checkout text-dark pt-3"> Checkout</p>

<div class="container mt-1 " >
   <form action="{{url('chechout2')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row ">
   <div class="col-md-7 p-2 " style="border: .1px solid rgba(0,0,0,.1) ;">
    <p class="mb-0 py-2 px-2 font-weight-bold">Your Information</p>
    <hr class="m-0">
    
    <div class="row p-3">
      
     <x-sameinputcomponent />
      
    
      <div class="col-md-6">
         <label class="mt-3"><i class="fas fa-building"></i> City <span class="text-danger">*</span></label>
          <select class="form-control border border-secondary" name="city" required id="city">
            
            @foreach($cities as $city)
             <option value="{{$city['shipping_cost']}}">{{ucfirst($city['city'])}}</option>
             @endforeach
         </select>
          <span class="text-danger">@error ('city') {{$message}} @enderror</span>
      </div>

     <!--  <div class="col-md-6">
          <label class="mt-3"><i class="fas fa-file-archive"></i> Post Code</label>
          <input type="text" name="post_code" class="form-control border border-secondary" >
          <span class="text-danger">@error ('post_code') {{$message}} @enderror</span>
      </div> -->
      
      <div class="col-md-6">
          <input type="checkbox" name="payment" value="cash on delivery"  class="mt-3 border border-secondary mt-sm-3 mt-md-5 mb-5 mb-sm-5 mb-sm-0" required checked>
          <span>Payment On Delivery</span>
           <span class="text-danger">@error ('payment') {{$message}} @enderror</span>
      </div>

     </div>
   </div>
  
  <div class="col-md-5 col-12 p-2" style="border: .1px solid rgba(0,0,0,.1) ;">
    
    <p class="py-2 mb-0 font-weight-bold">Shopping Cart Review</p>
    <hr class="m-0">
       
    @php $total = 0;$currency=''; @endphp
    @if(session('cart'))
    @foreach(session('cart') as $id => $details)
      @php $total += $details['price'] * $details['quantity']; $currency=$details['currency'] @endphp
    
    <div class="row mt-1">
      <div class="col-md-4 col-4">
        <img src="{{asset('uploads/img/' .$details['image'])}}" width="100%" height="100rem">
      </div>
      
      <div class="col-md-8 col-8">
           <p class="overlayi mb-0 name">{{ucwords($details['name'])}}</p>
           <p class="mb-0 ">Color: {{ucwords($details['color'])}}</p>
           <p class="mb-0 ">Size: {{ucwords($details['size'])}} <span class="float-right">{{$details['currency']}}: {{ucwords($details['price'])}}</span></p>
           
           <p class=" mb-2 d-flex quentity_data">
            <button class="btn btn-xs btn-info minus2" type="button" >-</button>
            <input type="number" value="{{$details['quantity']}}" name="quentity[]" class="form-control w-50 quentity2"  data-stock="{{$details['stock']}}">
            <button class="btn btn-xs btn-info add2" type="button" >+</button></p>

            <input type="hidden" name="price[]" value="{{$details['price']}}" class="price">
            <input type="hidden"  class="save_value" value="{{$details['price']}}">
      </div>
    </div>
    <hr class="mt-2">
        <input type="hidden" name="product_id[]" value="{{$id}}">
        <input type="hidden" name="product[]" value="{{$details['name']}}">
       
        
        <input type="hidden" name="image[]" value="{{ $details['image']}}">
        <input type="hidden" name="sub_id[]" value="{{ $details['sub_id']}}">
        
        
        
        <input type="hidden" name="color[]"  value="{{ $details['color']}}">
        <input type="hidden" name="size[]"  value="{{ $details['size']}}">
     @endforeach
    @endif
    
    <input type="hidden" name="total" id="total_input" value="{{$total}}">
    <hr>
    <div class=" mt-1  total_order_price">
      <p class="mb-2">Sub Total</p>
      <p class="mb-2">{{ $currency}}: <span id="total">{{$total}}</span></p>
    </div>
           
    <hr class="m-0">
    <div class=" mt-2  total_order_price">
      <p class="mb-2">Shipping Cost</p>
      <p class="mb-2">{{ $currency }}:  <span id="shipping_cost"></span></p>
    </div>
    
   
    <hr class="m-0">
    <div class=" mt-2  total_order_price">
      <p class="mb-2">Grand Total</p>
      <p class="mb-2">{{ $currency }}:<span id="grand_total"></span></p>
    </div>

    <button class=" btn btn-check  btn-block mt-5 rounded py-3 text-light mb-1">Order Now</button>
            
           
      </div>

     </div>
                
   </form>


</div>
</div>


@endsection
@section('script')
@parent
<script type="text/javascript">

//this page reload function 
//is defined in master page
  reloadPage();

    $('#city').change(function()
    {
        let value=$(this).val();
        $('#shipping_cost').text(value)

         let sum2 = 0;        
   $('.save_value').each(function() 
   {         
     if(!isNaN($(this).val()) && $(this).val().length!=0) 
      {
       sum2 += parseInt($(this).val());    
      }         
   });
        grnd_total=parseInt(sum2 )+ parseInt(value);
  
        $('#total').text(sum2)
        $('#grand_total').text(grnd_total)
        $('#total_input').val(grnd_total)
    });

    $(document).on('click','.add2',function()
    {

     let value=$(this).siblings('.quentity2').val()
     let stock=$(this).siblings('.quentity2').data('stock')

      if(stock > value)
      {
        value++
      }
     
     $(this).siblings('.quentity2').val(value)
       
        let ship_cost=$('#city').val();
        let price=$(this).parents('.quentity_data').siblings('.price').val();
       $(this).parents('.quentity_data').siblings('.save_value').val();
        
      let  grnd_total=price*value;
        $(this).parents('.quentity_data').siblings('.save_value').val(grnd_total);

        let sum2 = 0;        
   $('.save_value').each(function() 
   {         
     if(!isNaN($(this).val()) && $(this).val().length!=0) 
      {
       sum2 += parseInt($(this).val());    
      }         
   });
         $('#total').text(sum2)
         sum2=sum2+parseInt(ship_cost)
          
         $('#shipping_cost').text(ship_cost)
        $('#grand_total').text(sum2)
        $('#total_input').val(sum2)
});

$(document).on('click','.minus2',function(){

let value=$(this).siblings('.quentity2').val()
     value--;
     if(value<=0)
     {
      value=1;
     
     }
     $(this).siblings('.quentity2').val(value)

         let ship_cost=$('#city').val();
        let price=$(this).parents('.quentity_data').siblings('.price').val();
       $(this).parents('.quentity_data').siblings('.save_value').val();
        
      let  grnd_total=price*value;
        $(this).parents('.quentity_data').siblings('.save_value').val(grnd_total);

        let sum2 = 0;        
   $('.save_value').each(function() 
   {         
     if(!isNaN($(this).val()) && $(this).val().length!=0) 
      {
       sum2 += parseInt($(this).val());    
      }         
   });
          $('#total').text(sum2)
         sum2=sum2+parseInt(ship_cost)
          
         $('#shipping_cost').text(ship_cost)
        $('#grand_total').text(sum2)
        $('#total_input').val(sum2)
});

initialValue()
function initialValue()
{
   let ship_cost=$('#city').val();
     let sum2 = 0;        
   $('.save_value').each(function() 
   {         
     if(!isNaN($(this).val()) && $(this).val().length!=0) 
      {
       sum2 += parseInt($(this).val());    
      }         
   });

   sum2=parseInt(sum2) + parseInt(ship_cost);
       
       $('#shipping_cost').text(ship_cost)
        $('#grand_total').text(sum2)
        $('#total_input').val(sum2)
}
</script>
@endsection