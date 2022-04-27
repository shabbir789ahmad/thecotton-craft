<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSize;
class SizeController extends Controller
{
    function Index()
    {
        $sizes=ProductSize::all();
        return view('Dashboard.size.index',compact('sizes'));
    }

    function create()
    {
        return view('Dashboard.size.create');
    }


    function store(Request $request)
    {
        $request->validate([

          'product_size'=>'required',
          'size_name'=>'required',
        ]);

        try
        {

        ProductSize::create([
          
           'product_size'=>$request->product_size,
           'size_name'=>$request->size_name,
        ]);

        return redirect()->route('size.index')->with('success','Size Added Successfully');
        }catch(\Exception $e)
        {
             return redirect()->back()->with('success','Fail To Add Size');
        }
    }



   function edit($id)
   {

    $size=ProductSize::findorfail($id);
    return view('Dashboard.size.update',compact('size'));
   }

   function update(Request $request,$id)
   {
    $request->validate([

          'product_size'=>'required',
          'size_name'=>'required',
        ]);

        try
        {
         
        ProductSize::where('id',$id)->update([
          
           'product_size'=>$request->product_size,
           'size_name'=>$request->size_name,
        ]);

        return redirect()->route('size.index')->with('success','Size Added Successfully');
        }catch(\Exception $e)
        {
             return redirect()->back()->with('success','Fail To Add Size');
        }
   }

    function destroy($id)
    {
        ProductSize::destroy($id);
        return redirect()->route('size.index')->with('success','Size Deleted Successfully');
    }
}
