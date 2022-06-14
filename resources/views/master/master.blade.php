<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href=" {{asset('css/home.css')}} ">
<link rel="icon" href="{!! asset('pic/logo2.png') !!} " >

<link rel="stylesheet" type="text/css" href=" {{asset('css/homeproductround.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/about.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/test.scss')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/cart.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/contact.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/product.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/track.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/header.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/zoom.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/vendor.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/style.css')}} ">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<link rel="stylesheet" type="text/css" href=" {{asset('css/design.css')}} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">

<title></title>
<style>
 .float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    z-index:900;
    background-color:#0C9;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
}

.my-float{
    margin-top:15px;
    color: #fff;
}

.owl-prev,.owl-next{
    position: absolute;
    top: 35%;
    border: 2px solid black;
   padding: 1rem 1.2rem !important;
   color: #000 !important;
    background-color: #fff !important;
}
.owl-next{
   
    right: 2%; 
}
.owl-prev{
   
    left: 2%; 
}

.owl-prev:hover , .owl-next:hover  {
    outline: none;
    border: 1px solid #580631 !important;
    color: #580631 !important;
}

</style>
</head>
<body >
    @foreach($links as $link)
 <a href="https://wa.me/{{$link['phone']}}" class="float">
<i class="fab fa-whatsapp fa-2x my-float"></i>
</a>

@endforeach
    {{View::make('master.header')}}
    
  @yield('content')


  {{View::make('master.footer')}}



 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script  src="{{asset('js/filter.js')}}"></script>
 <script src="{{asset('js/select.js')}}"></script>  
 <script src="{{asset('js/button.js')}}"></script> 
 <script src="{{asset('js/zoomsl.js')}}"></script> 
 <script src="{{asset('js/script.js')}}"></script> 
 <script src="{{asset('js/show.js')}}"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 

 @if(Session()->has('success'))
<script>
   swal.fire({
  title: ' {{ Session()->get('success') }}',
  text: "Thanks",
  icon: "success",
  
}); 
</script>
 {{ Session()->forget('success'); }}

  @endif

 <script type="text/javascript">

  

 $('.owl-carousel').owlCarousel({
      margin: 15,
      nav: true,
      dots:false,
      loop:true,
       navText : ["<i class='fas fa-angle-left fa-2x p-3 border-secondary'></i> </i>","<i class='fas fa-angle-right fa-2x p-3'></i>"],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
    </script>

 

<script type="text/javascript">
    $("#click").click(function() {
  $("#nav").toggleClass("open");
  $('body').css({overflow: ($("#nav").hasClass("open") ? 'hidden' : 'scroll')});
});

//reload page function called in productdetail and checkout
 function reloadPage()
 {
    window.onpageshow = function(evt) {
    if (evt.persisted) {
        document.body.style.display = "none";
        location.reload();
    }
};
 }   
</script>
 <script type="text/javascript">
      $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                
            });
        });
    </script>

    <script type="text/javascript">
        $(".update-wish").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.wishlist') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".ts").attr("data-id"), 
                quantity: ele.parents(".ts").find(".quan").val()
            },
            success: function (response) {
              
            }
        });
    });

$(document).on('click','.wishlist',function(){
    let id=$(this).data('id')
    $(this).replaceWith('<i class="fas fa-heart overlay2 fa-lg text-danger remove_from_wish " data-id='+id+' data-count="4b" ></i>');
    
        $.ajax({
            url: '{{ route('add.to.wishlist') }}',
            method: "POST",
            dataType : 'json',
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                
             
            },
           
        }).done(function(res){
            countcart()
        });

   });
  
  $(document).on('click','.remove_from_wish',function()
  {
     let id=$(this).data('id')
     $(this).replaceWith('<i class="far fa-heart overlay2 fa-lg text-danger wishlist" id="wishlist" data-id='+id+' data-count="4b" ></i>');
    
     removeWishlist(id)

 });

  $(document).on('click',".remove-from-wish",function (e) {
        e.preventDefault();
       
        var id = $(this).data('id');
        $(this).parents('.remove_row').remove()
      removeWishlist(id)
        
    });

  function removeWishlist(id)
  {
   $.ajax({
                url: '{{ route('remove.from.wish') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: id
                },
                success: function (response) {
                    countcart()
                }
            });
  }
    </script>

    <script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".tr").attr("data-id"), 
                quantity: ele.parents(".tr").find(".quan").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(document).on('click',".remove-from-cart",function (e) {
        e.preventDefault();
  
        var ele = $(this);
          
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: $(this).data('id'),
                },
                success: function (response) {
                     window.location.reload();
                   
                }
            });
        }
    });

countcart()
    function countcart()
    {

  
        $.ajax({
            url: '{{ route('count.cart') }}',
            method: "get",
           
            success: function (response) 
            {
              
               $('.number').text(response.cart)
               $('.number2').text(response.wishlist)
            }
  
    });
}

$('#myCarousel').carousel({
  interval: 3000,
  cycle: true
}); 
  
</script>
<script>

        var baseURL = "{{ url("") }}" + "/";
     
    </script>
@section('script')
@show
</body>
</html>
