 <div class="item mx-1">
     <div class="card">
       <figure class="figure2 mb-0">
       <a href="{{url('get/all/category/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['category_image'])}}"class="rounded img-fluid"  width="100%" height="100%" loadding="lazy"></a>
       <p>{{ucfirst($category['category'])}}</p> 
     </figure>
   </div> 
</div>