<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;
class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $facebookId = User::where('facebook_id', $user->id)->first();
     
            if($facebookId){
                Auth::login($facebookId);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt('john123')
                ]);
    
                Auth::login($createUser);
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
