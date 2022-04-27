@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{route('slider.index')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Slider
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text_color">Update  Slider</h4>
   </div>
 </div>
<a href="{{route('slider.index')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text_color fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{route('slider.index')}}">
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
            
  <form action="{{route('slider.update',['slider'=>$slider['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  <input type="hidden" name="id" value="{{$slider['id']}}">
  <label class="text-dark font-weight-bold">Slider Tag (max 12 charcater allowed)</label> 
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <input type="text" name="tag" placeholder="" class="form-control "  value="{{$slider['tag']}}" required="">
  <br>
  <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
  </div>                      
 </div>
</div>
<span class="text-danger mt-3">@error('tag') {{$message}} @enderror</span> 
<label class="text-dark font-weight-bold">Slider Heading (max 20 charcater allowed)</label> 
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <input type="text" name="heading" placeholder="" class="form-control "  value="{{$slider['heading']}}" required="">
  <br>
  <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
  </div>                      
 </div>
</div>
<span class="text-danger mt-3">@error('heading') {{$message}} @enderror</span> 
<label class="text-dark font-weight-bold">Slider Detail (max 120 charcater allowed)</label> 
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <input type="text" name="detail" placeholder="" class="form-control "  value="{{$slider['detail']}}" required="">
  <br>
  <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
  </div>                      
 </div>
</div>
<span class="text-danger mt-3">@error('detail') {{$message}} @enderror</span> 

<label class="text-dark font-weight-bold">Slider Image</label> 
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <select class="form-control border-secondary" name="category_id">
  
    @foreach($subcategories as $category)
    <option value="{{$category['id']}}" @if($category['id']==$slider->category_id) selected @endif >{{$category['smenue']}}</option>
    @endforeach
  </select>
  <br>
  <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
  </div>                      
 </div>
</div>
<span class="text-danger mt-3">@error('category_id') {{$message}} @enderror</span>


  <label class="text-dark font-weight-bold">Slider Image</label>
  
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">  
  <input type="file" name="image" placeholder="website image" class="form-control "  value="">
  <br>
  <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
  </div>                      
 </div>
 <span class="text-danger mt-3">@error('image') {{$message}} @enderror</span>
</div>
  
  <img src="{{asset('uploads/img/' .$slider['image'])}}" width="20%">
  
 

    
  <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
  </form>
          </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div>



 
</div>


@endsection