 @extends('Dashboard.admin')
@section('content')

<div class="b p-5 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{route('category.create')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Create 
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text_color">All  Category</h4>
   </div>
 </div>
<a href="{{route('category.index')}}" class="ml-auto">
   <div class="card shadow border  p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text_color fa-sm"></i> Update
   </div>
 </div>
</a>
<a href="{{route('category.index')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-sm"></i> Delete
   </div>
 </div>
</a>
</div>
 
 <div class="container-fluid mt-5">
  <div class="row">
      @foreach($categories as $slid)
   
      <div class="col-md-4 col-sm-4 col-12 mt-3">
       <div class="card">
        <img src="{{asset('uploads/img/'.$slid['category_image'])}}" width="100%" height="200rem">
          <div class="card-body">
            <h4 class="h4 text-center">{{ucwords($slid['category'])}}</h4>
        
          <div class="b d-flex justify-content-center mt-3">
       <a href="{{route('category.edit',['category'=>$slid['id']])}}">
           <button class="btn btn-lg btn-color text-light"> Update
           </button>
        </a>
       <form action="{{route('category.destroy',['category'=>$slid['id']])}}" method="POST">
       @csrf
       @method('DELETE')  
         <button class="btn btn-lg btn-danger ml-3" onclick="return confirm('Are you sure?  ')"> Delete
         </button>
       </form>
           
           </div>
          </div>
       </div>

    </div>
 
@endforeach
</div>

 </div>

 </div>

 @endsection