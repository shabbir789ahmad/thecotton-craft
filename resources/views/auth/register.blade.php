@extends('master.master')

@section('content')


<style type="text/css">
    .main-container{
       /*background: #EDEDF0;*/
        height: 44rem;
        overflow: hidden;
        display: flex;
        justify-content: center;
        
    }
 
  
    .input_style
    {
  
     border: none;
   border-radius: .2rem;
  border: 1px solid #580631;
  outline: none;
  width: 100%;
  height: 3.5rem;

  font-size: 1em;
  background-color: #EFEFEF;
  color: #000;
}
.form_width{
    width: 35%;
}

/*.btn_width{
width: 82%;
}*/



@media screen and (max-width: 480px )
{

 .form_width{
    width:100%;
}

}



@media (min-width: 481px) and (max-width: 768px) {

 .form_width{
    width: 80%;
}


}
@media (min-width: 769px) and (max-width: 1024px) {
 .form_width{
    width: 60%;
}
}
/*@media (min-width: 1025px) and (max-width: 1200px) {
  html { background: green; }
}*/


</style>
<div class="main-container ">
  
  
   <form method="POST" action="{{ route('register') }}"  class="form_width">
              @csrf
              <h2 class=" text-center ">Sign Up With</h2>
         
      <br>
      <!--    <x-sociallogin /> -->
<!--        <h6 class="text-center mt-4 mb-4">OR</h6> -->
           

           <input id="name" type="text" class="input_style shadow mt-3 @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" >
                @error('name')
                 <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                 </span>
                @enderror

             <input id="email" type="email" class="input_style shadow mt-4 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <input id="phone" type="number" class="input_style shadow mt-4 @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}" required autocomplete="phone">
                  @error('phone')
                   <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                   </span>
                 @enderror


                <input id="password" type="password" placeholder="Password" class="input_style mt-4 shadow @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <input id="password-confirm" type="password" placeholder="Conform Password" class="input_style shadow mt-4 " name="password_confirmation" required autocomplete="new-password">


                <input id="image" type="file" placeholder="Choose Image" class="input_style shadow mt-4 " name="image"  accept="image/*">



            <button type="submit" class="btn btn-check py-3 text-light   mt-4 btn-block " s> {{ __('Register') }}</button>
          
          </form>


</div>
 
            









@endsection
