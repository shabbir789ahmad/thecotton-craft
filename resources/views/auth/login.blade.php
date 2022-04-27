@extends('master.master')

@section('content')


<style type="text/css">
    .main-container{
       /*background: #EDEDF0;*/
        height: 36rem;
        overflow: hidden;
        display: flex;
        justify-content: center;
        margin-top: 4%;
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
  
  
   <form method="POST" action="{{ route('login') }}"  class="form_width">
              @csrf
              <h2 class=" text-center ">Login</h2>
         
      <br>
        <!--  <x-sociallogin />
       <h6 class="text-center mt-4 mb-4">OR</h6> -->
            <input id="email" type="email" class="input_style shadow @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">                   
                <strong>{{ $message }}</strong>     
            </span>        
           @enderror

            <input id="password" type="password" class="input_style mt-4 shadow @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

            @error('password')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
            @enderror
          
          <div class="row mb-3 ">
             <div class="col-md-6 col-6">
              <div class="form-check mt-5">
               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

               <label class="form-check-label" for="remember">
                 {{ __('Remember Me') }}
               </label>
              </div>
             </div>
                            
             <div class="col-md-6 col-6 mt-5">
              @if (Route::has('password.request'))
                <a class="text-dark rounded text-light mt-5" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }} </a>
              @endif
             </div>
            </div>

             <div class="row ">
             <div class="col-md-12">
                 <button type="submit"  class="btn btn-check text-light btn-block mt-3 btn_width">
                     {{ __('Login') }}</button>
             </div>
             <div class="col-md-12 mt-4 p-0 text-center">
                 <a class=" mt rounded text-dark " href="{{  route('register') }}">
                  {{ __('Create Your Account') }}
                 </a>
             </div>
             </div>

    </form>
</div>
 
            









@endsection
