<?php 
use App\Models\Category;
$sub=Category::category();

?>


  </div>
</div> 
  
 <header class="shadow" >
    <div class="container con2">
     <input type="checkbox" name="" id="check">
      <div class="logo-container">
        @foreach($logo as $log)
         <a href="{{url('/')}}"> <img src="{{asset('uploads/img/' .$log['logo'])}}" ></a>
        @endforeach
      </div>
     <div class="nav-btn">
      <div class="nav-links">
       <ul>
        @foreach($sub as $su)
         <li class="nav-link px-0 py-1" style="--i: .85s">
           <a href="{{url('get/all/category/' .$su['id'])}}">{{$su['category']}}
             @if($su['id']==5)

             @else
            <i class="fas fa-caret-down"></i>
          @endif</a>
           <div class="dropdown">
             @foreach($su['submenues'] as $subcategory)
              @if($su['id']==$subcategory['menue_id'])
              @if($su['id']==5)

              @else
              <ul>
                <li class="dropdown-link">
                 <a href="{{url('product/' .$subcategory['id'])}}">{{ucwords($subcategory['smenue'])}}</a>
                </li>
              </ul>
              @endif
               @endif
             @endforeach   
            </div>
          </li>
         @endforeach 
       </ul>
     </div>   
  </div>

      <div class="icn mt-2 float-right mr-3 mr-md-0">
       
       
     @guest
          @if (Route::has('login'))
          <a class="  float-right mr-2 mt-2" href="{{ route('login') }}"><i class="fas fa-user icon_color fa-lg mt-3 float-right"></i></a>
          @endif
          @else
        
          @if(Auth::user())
         
           
           <div class="btn-group profile_image">
             @if(is_null(Auth::user()->profile))
    
       <img src="{{asset('pic/icons8-administrator-male-80.png')}}" width="100%" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       @else
          <img src="{{asset('uploads/img/'.Auth::user()->profile)}}" width="100%" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @endif
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button"><a href="{{url('user_dashborad')}}"> Dashboard</a></button>
    <button class="dropdown-item" type="button"><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
               @csrf
             </form></button>
  </div>
</div>
          @endif
     @endguest
          
    <a href="{{url('get-wishlist')}}" class=>
       <i class="far fa-heart fa-lg float-right mt-4 icon_color"  aria-hidden="true"><span class="number2">0</span></i>
    </a>

          <a href="{{url('cart')}}">
           <i class="fa fa-shopping-cart fa-lg float-right mt-4 icon_color"  aria-hidden="true"><span class="number">0</span></i>
          
      
          </a>
          

            </div>      
  <div class="hamburger-menu-container mt-0">
   <div class="hamburger-menu">
        <div></div>
    </div>
  </div>
           
            
        </div>
    </header>
    