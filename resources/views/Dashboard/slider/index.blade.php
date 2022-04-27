@extends('Dashboard.admin')
@section('content')
<style type="text/css">
    .show_hide,.show_hide2{
        position: absolute;
        top: 7%;
        right: 10%;
        border-radius: 50%;
        background-color: #4C0027;
        padding: .5rem .7rem;
        color: #fff;
    }
</style>
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
  <h4 class="text-center font-weight-bold text_color">All Slider</h4>
   </div>
 </div>
<a href="{{route('slider.index')}}" class="ml-auto">
   <div class="card shadow border  p-0 mr-2">
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
 
 <div class="container-fluid mt-5">
  <div class="row">
      @foreach($slider as $slid)
   
      <div class="col-md-4 col-sm-4 col-12 mt-3">
       <div class="card" style="height:28rem">
          <div class="card-body">
            @if($slid['show']==1)
            <span class="show_hide" data-id="{{$slid['id']}}" data-show="{{$slid['show']}}"><i class="fas fa-eye"></i></span>
            @else
             <span class="show_hide2" data-id="{{$slid['id']}}"  data-show="{{$slid['show']}}"><i class="fas fa-eye-slash"></i></span>
            @endif
            <img src="{{asset('uploads/img/'.$slid['image'])}}" width="100%" height="200rem">
            <h6 class="font-weight-bold">{{$slid['tag']}}</h6>
            <h3 class="font-weight-bold">{{$slid['heading']}}</h3>
            <p>{{$slid['detail']}}</p>
          <div class="b d-flex justify-content-center mt-3">
            
       <a href="{{route('slider.edit',['slider'=>$slid['id']])}}">
           <button class="btn btn-lg btn-color text-light"> Update
           </button>
        </a>
      <form action="{{route('slider.destroy',['slider'=>$slid['id']])}}" method="POST">
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
 @section('script')
 <script type="text/javascript">
     $(document).on('click','.show_hide',function(){
     
      let id=$(this).data('id');
      $(this).replaceWith(`<span class="show_hide2" data-id="{{$slid['id']}}"  data-show="{{$slid['show']}}"><i class="fas fa-eye-slash"></i></span>`)
       show(id,0)


     });

      $(document).on('click','.show_hide2',function(){
     
      let id=$(this).data('id');
      $(this).replaceWith(` <span class="show_hide" data-id="{{$slid['id']}}" data-show="{{$slid['show']}}"><i class="fas fa-eye"></i></span>`)
       show(id,1)


     });

     function show(id,show)
     {
        $.ajax({

         url:'show/hide',
         dataType:'json',
         data:{
            id:id,
            value:show,
         }

      }).done(function(){
        
      });
     }
 </script>
 @endsection