@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{route('color.create')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Color
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update Color</h4>
   </div>
 </div>

<a href="{{route('color.index')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{route('color.index')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
       <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 col-sm-1">

          </div>
          <div class="col-md-8 card col-sm-10 border border-success mt-5 p-5">
            
      <form action="{{route('color.update',['color'=>$color['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
      @method('PUT')
   
    <span class="text-danger mt-3">@error('menue_id') {{$message}} @enderror</span>
    <br>
<label class="mt-3 font-weight-bold">Color (hex value or proper color name)</label>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <input type="text" name="colors" placeholder="Title" class="form-control "  value="{{$color['colors']}}"><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
    <span class="text-danger">@error('colors') {{$message}} @enderror</span>

   <label class="mt-3 font-weight-bold">Color Name</label>
      <div class="form-group">
       <div class="input-group clockpicker" id="clockPicker1">   
        <input type="text" name="color_name" placeholder="Color Name" class="form-control "  value="{{$color['color_name']}}" required=""><br>
              
         <div class="input-group-append">
           <span class="input-group-text"><i class="fas fa-tag"></i></span>
         </div>                      
       </div>
      </div>
      <span class="text-danger">@error('color_name') {{$message}} @enderror</span>

   
  <button  class="btn btn-block btn-color text-light mt-5">Update</button>
  </form>
          </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div>



 
</div>


@endsection