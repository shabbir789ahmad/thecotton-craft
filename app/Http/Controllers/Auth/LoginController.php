<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request)
    {
          $redirectTo = RouteServiceProvider::HOME; 
          return redirect($redirectTo);
    }

 // protected function authenticated(Request $request, $user)
 //    {
        
 //         return redirect('/');
        
 //    }
    public function showLoginForm()
{
    if(!session()->has('url.intended'))
    {
        session(['url.intended' => url()->previous()]);
    }
    return view('auth.login');
}
     protected function guard()
    {
        return Auth::guard('web');
    }
}