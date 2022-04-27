@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{route('size.create')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Create
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text_color">All Sizes</h4>
   </div>
 </div>

<a href="{{route('size.index')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text_color fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{route('size.index')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
         
     
<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4 mt-4">
  
    
   <div class="table-responsive p-0">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="header_color">
   <tr>
    
    <th>Color</th>
    <th>Color Name</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($sizes as $size)
  <tr>
     
     
     <td>{{ucfirst($size['product_size'])}}</td>
     <td>{{ucfirst($size['size_name'])}}</td>
  
    <td>
     <div class="b d-flex justify-content-center mt-3">
     
                  <form  action="{{ route('size.edit',['size' => $size->id])}}" method="GET" class="stock_form " >
                    @csrf
                    <input type="hidden" name="brandss" class="brnd">
                   <button class="btn btn-color text-light btn-xs stc" >Update</button>
                  </form>
                  <form action="{{ route('size.destroy', ['size' => $size->id]) }}" method="POST" class="ml-1" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                
                  </form>
               
        </div> 
      </td>
        </tr>
         @endforeach
         </tbody>
         </table>
       </div>

  </div>
 </div>
</div>   


 </div>

 @endsection