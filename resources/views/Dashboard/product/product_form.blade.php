@extends('Dashboard.admin')
@section('content')
<style type="text/css">
  .choices__inner{
    border: 1px solid #757575;
  }
</style>
<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('get-product')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Product
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color"></h4>
   </div>
 </div>

<a href="{{url('get-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('get-product')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
    
<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Upload Product
    </h4>
            
<form action="{{url('uproduct')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 <div class="row">

 <div class="col-md-6">
    <label class="font-weight-bold">Select Category<span class="text-danger">*</span></label>
    <select class="form-control select border-secondary" id="main2" name="cat_id" required="">
      <option disabled selected hidden> Select  Category</option>
         @foreach($main as  $mc)
       <option value="{{$mc['id']}}">{{ucfirst($mc['category'])}}</option>
     @endforeach
    </select> 
    <span class="text-danger">@error('cat_id') Main Category Field is required @enderror</span>
 </div>
 
 <div class="col-md-6">
    <label class="font-weight-bold">Select Sub Category<span class="text-danger">*</span></label>
     <select class="form-control select  subcategory border-secondary"  name="sub_id" required="">
            
    </select>

    <span class="text-danger">@error('sub_id') Category Field is required @enderror</span>
 </div>
           


  <div class="col-md-12">
    <label class="font-weight-bold mt-3">Product Name<span class="text-danger">*</span></label>
    <input type="text" name="name" placeholder="Product Name" class="form-control border-secondary" value="{{old('name')}}" required="">
   <span class="text-danger">@error('name') {{$message}} @enderror</span>

  </div>

  <div class="col-md-12">
    <label class="font-weight-bold mt-3">Product detail<span class="text-danger">*</span></label> 
    <textarea class="form-control border-secondary" name="details" rows="5" placeholder="Product details Here" required></textarea>  
    <span class="text-danger">@error('details') {{$message}} @enderror</span>
  </div>

<label class="font-weight-bold mt-3 ml-3">Product detail<span class="text-danger">*</span></label> 
  <div class="col-md-12" id="detail_field_append">
    
    <div class="row a" >
      <div class="col-md-12 d-flex">
       <input type="text" name="detail[]" class="form-control mt-1 border border-secondary mr-2" placeholder="Product Detail">
       <button class="btn btn-info  btn-xs add" >Add</button>
      </div>
    
    </div> 
    <span class="text-danger">@error('detail') {{$message}} @enderror</span>
  </div>


  <div class="col-md-6">
    <label class="font-weight-bold mt-2">Product Sizes</label> 

    <select id="choices-multiple-remove-button" name="size[]" placeholder="Select  Upto 5 Sizes" multiple >
            @foreach($sizes as $size)
      <option value="{{$size['product_size']}}">{{ucfirst($size['size_name'])}}</option>
     @endforeach
     </select>
   <span class="text-danger">@error ('size') {{$message}} @enderror</span>
  </div>

  <div class="col-md-6">
   <span class="text-danger">@error('total') {{$message}} @enderror</span>
    <label class="font-weight-bold mt-2">Product Stock <span class="text-danger">*</span></label> 
    <input type="number" name="total" placeholder="Product Quentity" class="form-control border-secondary"  value="{{old('total')}}" required=""><br>
  </div>

  <div class="col-md-6">
    <span class="text-danger">@error('price') {{$message}} @enderror</span>
    <div class="form-group">
      <label class="font-weight-bold">Choose Currency<span class="text-danger">*</span></label> 
      <select class="form-control border-secondary" name="currency">
        <option value="PKR">PKR</option>
        <option value="$">$Doller</option>
      </select><br>
    </div>
  </div>

  <div class="col-md-6">
   <span class="text-danger">@error('price') {{$message}} @enderror</span>
   <label class="font-weight-bold">Product Price<span class="text-danger">*</span></label> 
   <input type="number" name="price" placeholder="Product Price" class="form-control border-secondary"  value="{{old('price')}}" required="">
     <br>
  
  </div>

  <div class="col-md-6">
   <span class="text-danger">@error('product_discount') {{$message}} @enderror</span>
   <label class="font-weight-bold">Product Discount<span class="text-danger">*</span></label> 
   <input type="number" name="product_discount" placeholder="Product Discount" class="form-control border-secondary"  value="{{old('product_discount')}}" required="">
     <br>
  
  </div>

  <div class="col-md-6">
    
    <label class="font-weight-bold">Product Color</label> 
    <select id="choices-multiple-remove-button" name="color[]" placeholder="Select  Upto 5 colors" multiple>
            @foreach($colors as $color)
           <option value="{{$color['colors']}}">{{$color['color_name']}}</option>
       @endforeach
     </select>
     <span class="text-danger">@error('color') {{$message}} @enderror</span>
  </div>

  <div class="col-md-6">
     <label class="font-weight-bold">Product Image<span class="text-danger">*</span></label> 
      <input type="file" name="rimage[]" class="form-control border-secondary" multiple  required="" accept="image/*">
      <span class="text-danger"> Press Ctr To Select Multiple Images</span>
     
  </div>
  
  <div class="col-md-6">
    <label class="font-weight-bold">Product Brand<span class="text-danger">*</span></label> 
    <select id="choices-multiple-remove-button" name="brand[]" placeholder="Select  Upto 5 Brands" multiple>
           @foreach($brand as $b)
      <option value="{{$b['bname']}}">{{$b['bname']}}</option>
       @endforeach
    </select>
  </div>
</div>
           


   
  <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
  </form>
 </div>        
</div>
</div>

 




@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function()
  {
    
    $(document).on('click','.add',function(){
      $(this).replaceWith('<button class="btn btn-danger btn-xs text-center  cancel" type="button" style="padding-right:1rem;padding-left:1.4rem;" ><i class="fas fa-trash-alt"></i></button>')
   
      $('#detail_field_append').append(`

         <div class="row a mt-2" >
      <div class="col-md-12 d-flex">
       <input type="text" name="detail[]" class="form-control mt-1 border border-secondary mr-2" placeholder="Product Detail">
      
       <button class="btn btn-info btn-xs add" type="button" >Add</button>
      </div>
    </div> 
        `);

    });

    $(document).on('click','.cancel',function(){

    $(this).parents('.a').remove();
    });
  

  });
</script>
@endsection
