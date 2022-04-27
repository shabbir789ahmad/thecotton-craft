<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenue;
use App\Models\Category;
use App\Models\Dropdown;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ImageTrait;
class SubCategoryController extends Controller
{
 
  use ImageTrait;
  function index()
   {
    $data=Category::
    join('submenues','categories.id','=','submenues.menue_id') ->get();
    
    return view('Dashboard.category.index',compact('data'));
   }

  

  function create()
   {
    $data=Category::category2();
    
    return view('Dashboard.category.category_uploads',compact('data'));
   }

    function store(Request $req)
    {
        $req->validate([
         'menue_id'=>'required',
         'image'=>'required',
         'smenue'=>'required'
        ]);

        $smenue=new Submenue;
        $smenue->menue_id=$req->menue_id;
        $smenue->smenue=$req->smenue;
        $smenue->menue_image=$this->image();

        if($smenue->save())
       {
        return redirect()->route('subcategory.index')->with('success','Sub Category  Created');
      }else{
        return redirect()->back()->with('success','Sub Category Creation Failed ');
      }
    }

    function edit($id)
   {
    $category=Category::category2();
    $data=Submenue::findorfail($id);
 
    return view('Dashboard.category.category_update',compact('data','category'));
   }


   
   function update(Request $req,$id)
    {
      

        $smenue=Submenue::findorfail($id);
        $smenue->menue_id=$req->menue_id;
        $smenue->smenue=$req->smenue;
        if($req->file('image'))
        {
             $smenue->menue_image=$this->image();
        }
       
        if($smenue->save())
       {
        return redirect()->route('subcategory.index')->with('success','Sub Category Has Been Update');
      }else{
        return redirect()->back()->with('success','Sub Category Updation Failed ');
      }
    }
  





   function destroy($id)
    {   
    
     $showcat=Submenue::destroy($id);
    
   
        return redirect()->back()->with('success','Sub Category Has Been Deleted');
    
    }

    public function subCategory(Request $req) 
{        
    $id=$req->id;
       $sunmenue = DB::table("submenues")->where('menue_id',$id)->
       pluck("smenue","id");

      return response()->json($sunmenue);
}

}
