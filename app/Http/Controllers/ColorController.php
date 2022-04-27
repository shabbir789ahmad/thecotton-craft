<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductColor;
class ColorController extends Controller
{
      public function index()
    {
        $colors=ProductColor::all();
        return view('Dashboard.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

         'colors'=>'required',
         'color_name'=>'required',
        
        ]);

   try{
        ProductColor::create([

              'colors'=>$request->colors,
              'color_name'=>$request->color_name,
              
        ]);

        return redirect()->route('color.index')->with('success','Color Uploaded');

    }catch(\Exception $e)
    {
       return redirect()->back()->with('success',' Fail To Upload Color ');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color=ProductColor::findorfail($id);
        return view('Dashboard.color.update',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

         'colors'=>'required',
         'color_name'=>'required',
        ]);

   //try{

     $data=[
         'colors'=>$request->colors,
         'color_name'=>$request->color_name,
             
     ];
        ProductColor::where('id',$id)->Update($data);

        return redirect()->route('color.index')->with('success','Color Updated');

    // }catch(\Exception $e)
    // {
    //    return redirect()->back()->with('success',' Fail To Upload Feature ');
    // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        ProductColor::destroy($id);
        return redirect()->route('color.index')->with('success','Color Deleted');
        }catch(\Exception $e)
         {
          return redirect()->back()->with('success',' Fail To Upload Color ');
       }
    }
}
