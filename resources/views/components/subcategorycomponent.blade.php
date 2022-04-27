 <div class="item mx-1">
     <div class="card">
       <figure class="figure2 mb-0">
       <a href="{{url('product/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['menue_image'])}}"class="rounded img-fluid"  width="100%" height="100%" loadding="lazy"></a>
       <p>{{ucfirst($category['smenue'])}}</p> 
     </figure>
   </div> 
</div>