
<div class="cof bg-dark" style="background-color:#580631 !important">
 <div class="card " style="background-color:#580631 !important; color:#fff">
  <div class="card-body">
   <div class="row mt-5">
    <div class="col-md-3 col-12 col-sm-12 text-center ">  
      <div class="footer_intro">
        @foreach($logo as $log)
       <img src="{{asset('uploads/img/'.$log['logo'])}}" width="80rem" height="45rem">
       
      
        @endforeach
      </div>
      <div class="social_icon mt-3">
        @foreach($links as $link)
       <a href="{{$link['facebook']}}"><i class="fa-brands fa-facebook-f fa-2x fa-md-lg"></i></a>
       <a href="{{$link['twitter']}}"><i class="fa-brands fa-twitter  fa-2x fa-md-lg"></i></a>
       <a href="{{$link['instagram']}}"><i class="fa-brands fa-instagram fa-2x fa-md-lg"></i></a>
       <a href="{{$link['linked']}}"><i class="fa-brands fa-youtube fa-2x fa-md-lg"></i></a>
       @endforeach
      </div>
    </div>
    <div class="col-md-2 col-12 col-sm-12  mt-2 mt-md-0">
      <div class="footer_intro">
       <h5>Navigations</h5>
      </div>
      <ul class="p-0 footer_list text-light">
        <li><a href="{{url('/')}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Home</a></li>
        <li><a href="{{url('about')}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>About Us</a></li>
        <li><a href="{{url('contact')}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Contact Us</a></li>
        <li><a href="#" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Feedback</a></li>
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
      <div class="footer_intro">
       <h5>Most Liked</h5>
      </div>
      <ul class="p-0 footer_list text-light">
     @foreach($submenues->slice(4,4) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
       
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
     <div class="footer_intro">
       <h5>Best Collection</h5>
      </div>
      <ul class="p-0 footer_list text-light">
       
        @foreach($submenues->slice(8,4) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
     <div class="footer_intro">
       <h5>Trending</h5>
      </div>
      <ul class="p-0 footer_list text-light">
       
        @foreach($submenues->slice(12,4) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}" class="text-light"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
     
     </ul>
    </div>
   </div>
  </div>
 </div>
</div>