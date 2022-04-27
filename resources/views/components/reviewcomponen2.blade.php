
   <div class="icon2 d-flex  ">
     @for($i=0; $i<5; $i++)
     @if($i<$detail['rating'])
        <span class="fa fa-star checked fa-xs"></span>
     @else
       <span class="fa fa-star fa-xs"></span>
     @endif
     @endfor
   </div>
