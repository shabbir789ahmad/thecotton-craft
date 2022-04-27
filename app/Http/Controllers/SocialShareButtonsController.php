<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        
        
        return view('posts', compact('shareComponent'));
    }
}
