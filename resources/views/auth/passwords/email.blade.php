@extends('master.master')

@section('content')


<style type="text/css">
    .main-container{
       /*background: #EDEDF0;*/
        height: 36rem;
        overflow: hidden;
        display: flex;
        justify-content: center;
        margin-top: 6%;
    }
 
  
    .input_style
    {
  
     border: none;
   border-radius: .2rem;
  border-bottom: 2px solid #580631;
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
.input_style:focus{
    border: 1px solid #580631;
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
   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
   
   <form method="POST" action="{{ route('password.email') }}"  class="form_width">
              @csrf
              <h2 class=" text-center ">Reset Password</h2>
     
<div class="form-group row">
                           

                           
                                <input id="email" type="email" class="input_style shadow @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
          
          <button type="submit" class="btn btn-check text-light py-3 rounded">
       {{ __('Send Password Reset Link') }}
    </button>

    </form>
</div>
 
            









@endsection


