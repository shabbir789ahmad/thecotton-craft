<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\Mainpage;
class SocialController extends Controller
{

    function index()
    {
        $social=Social::latest()->take('1')->first();
        return view('Dashboard.social.social_link_upload',compact('social'));
    }

   


    function update(Request $req)
    {

        $link= Social::findorfail($req->id);
        $link->facebook=$req->facebook;
        $link->twitter=$req->twitter;
        $link->instagram=$req->instagram;
        $link->linkdin=$req->linkdin;
        $link->phone=$req->phone;
        $link->email=$req->email;
        $link->address=$req->address;

        $link->save();
        return redirect()->route('admin.social-link')->with('success','Social Links And Data updated');
    }


   
}
