<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Store;
class BrandController extends Controller
{
   
   function index()
   {
     $brand=Brand::all();
       return view('Dashboard.brand.index',compact('brand'));
   }

   function create()
   {
    
       return view('Dashboard.brand.brand_upload');
   }


    function store(Request $req)
    {
        $req->validate([
          'bname'=>'required',
        ]);

        $brand=new Brand;
        $brand->bname=$req->bname;
        $brand->save();

        return redirect()->route('brand.index')->with('success','New Brand Uploaded');
    }

    function edit($id)
    {
       $brand=Brand::findorfail($id);
       return view('Dashboard.brand.brand_update',compact('brand'));
    } 

    function update(Request $req,$id)
    {
       $brand=Brand::findorfail($id);
        $brand->bname=$req->bname;
        $brand->save();

    return redirect()->route('brand.index')->with('success','Brand  Updated');
    } 
    public function destroy($id)
    {
    
        $brand=Brand::destroy($id);
      
        return redirect()->back()->with('success','Brand Has Been Deleted');
    }

    public function deleteBrand($id)
    {
    
        $brand=Store::findorfail($id);
        $brand->delete();
        return redirect()->back()->with('success','Brand Has Been Deleted');
    }
     
    
}
