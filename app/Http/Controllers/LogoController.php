<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $logos=Logo::all();
    
    return view('Dashboard.logo.index',compact('logos'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Dashboard.logo.logo_upload');
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
     'logo'=>'required',
     'text'=>'required',
    
    ]);
    if($request->hasfile('logo'))
    {
       $slider=new Logo;
      $file=$request->file('logo');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->logo=$filename;
    }
    $slider->text=$request->text;
    $slider->save();
    return redirect()->route('logo.index')->with('success','Logo has been Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logos=Logo::findorfail($id);
 
   return view('Dashboard.logo.logo_update',compact('logos'));
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
     

     $logo=Logo::findorfail($id);
    
    if($request->hasfile('logo'))
    {
      
         $file=$request->file('logo');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $logo->logo=$filename;
    }

   $logo->text=$request->text;
    $logo->save();
    return redirect()->route('logo.index')->with('success','Logo has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $logo=Logo::destroy($id);
   
    return redirect()->back()->with('success',"Logo has been Deleted");
    }
}
