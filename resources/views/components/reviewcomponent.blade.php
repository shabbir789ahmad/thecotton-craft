
   <div class="icon2 d-flex  ">
     <p class="pt-0 "> 
       @for($i=0; $i<5; $i++)
       @if($i<$detail['rating'])
           <span class="fa fa-star checked fa-xs"></span>
       @else
          <span class="fa fa-star fa-xs"></span>
       @endif
       @endfor
     </p>
     <p>({{count($user_review)}})Review</p>
   </div>
