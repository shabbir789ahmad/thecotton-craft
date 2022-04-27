@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{route('subcategory.create')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Create
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update or Delete Sub Category</h4>
   </div>
 </div>

<a href="{{route('subcategory.index')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{route('subcategory.index')}}">
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
  
    
   <div class="table-responsive p-0 ">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="header_color">
   <tr>
    <th>Image</th>
    <th>Sub Category</th>
    <th> Category</th>
    
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($data as $show)
  <tr>
     
     <td class="col-2"><img src="{{asset('uploads/img/' .$show['menue_image'])}}" width="100%" height="100rem"></td>
     <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
  
    <td>
     <div class="b d-flex justify-content-center mt-3">
     
                  <a href="{{route('subcategory.edit',['subcategory'=>$show['id']])}}" >
           <button class="btn btn-sm btn-color text-light"> Update
           </button>
        </a>
                  <form action="{{ route('subcategory.destroy', ['subcategory' => $show->id]) }}" method="POST" class="ml-1" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">
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
