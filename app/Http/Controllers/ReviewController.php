<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
class ReviewController extends Controller
{

    function index()
    {
        $reviews=Review::latest()->paginate(10);

        return view('Dashboard.comment.index',compact('reviews'));
    }

    function review(Request $req)
    {   
        $req->validate([
          'uname'=> 'required',
          'rating' => 'required',
          'message' => 'required',
        ]);
         
         

            $review=New Review;
            $review->uname=$req->uname;
            $review->rating=$req->rating;
            $review->message=$req->message;
            $review->review_id=$req->review_id;
            $review->user_id=Auth::user()->id??null;
            $review->save();
            
            return redirect()->back()->with('success','Thank you for Reviews');
         
    }

    function destroy($id)
    {
        Review::destroy($id);
        return redirect()->back()->with('success','Review Deleted');
    }



}
