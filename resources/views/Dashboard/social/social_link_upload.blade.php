@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('/social-link')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Social
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text_color"></h4>
   </div>
 </div>

<a href="{{url('/social-link')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text_color fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('/social-link')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
    
<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header header_color font-weight-bold">
 <i class="fab fa-product-hunt"></i> Update Social Links And Contact Detail
    </h4>
            
<form action="{{url('/update-social-link')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 <div class="row">
 <div class="col-md-6">

 <input type="hidden" name="id" value="{{$social['id']}}">  
            
  
<span class="text-danger">@error('facebook') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
    <input type="text" name="facebook" placeholder="facebook Profile link" class="form-control "  value="{{$social['facebook']}}"><br>
               
    <div class="input-group-append">
   <span class="input-group-text px-3"><i class="fab fa-facebook-f "></i></span>
   </div>                      
  </div>
 </div> 

 <span class="text-danger">@error('twitter') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
    <input type="text" name="twitter" placeholder="twitter Profile Link" class="form-control "  value="{{$social['twitter']}}"><br>
               
    <div class="input-group-append">
   <span class="input-group-text "><i class="fab fa-twitter"></i></span>
   </div>                      
  </div>
 </div>     
   
   <span class="text-danger">@error('instagram') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
    <input type="text" name="instagram" placeholder="Instagram Profile Link" class="form-control "  value="{{$social['instagram']}}"><br>
               
    <div class="input-group-append">
   <span class="input-group-text "><i class="fab fa-instagram"></i></span>
   </div>                      
  </div>
 </div>

<span class="text-danger">@error('linkdin') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
    <input type="text" name="linkdin" placeholder="linkdin Profile Link" class="form-control "  value="{{$social['linkdin']}}"><br>
               
    <div class="input-group-append">
   <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
   </div>                      
  </div>
 </div>
     </div>
    <div class="col-md-6">
  <span class="text-danger">@error('phone') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
        <input type="text" name="phone" placeholder="Your Phone Number" class="form-control" value="{{$social['phone']}}">
   
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-phone"></i></span>
    </div>                      
    </div>
  </div>
 <span class="text-danger">@error('email') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="email" placeholder="Your Email" class="form-control "  value="{{$social['email']}}"><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-envelope"></i></span>
   </div>                      
  </div>
 </div>
  <span class="text-danger">@error('address') {{$message}} @enderror</span>
          
    <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">
     <input type="text" name="address" placeholder="Your Address " class="form-control"  value="{{$social['address']}}">
                 
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>                      
  </div>
 </div>      

  
         </div>
        </div>
           

   
  <button  class="btn  btn-block btn-color text-light mt-5" >Submit</button>
  </form>
 </div>        
</div>
</div>

 



@endsection