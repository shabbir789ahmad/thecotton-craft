<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Traits\ImageTrait;
class ShopController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops=Shop::all();
        return view('Dashboard.shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.shop.create');
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

         'title'=>'required',
         'text'=>'required',
         'image'=>'required',
        ]);

   try{
        Shop::create([

              'title'=>$request->title,
              'text'=>$request->text,
              'image'=>$this->image(),
        ]);

        return redirect()->route('shop.index')->with('success','Feature Uploaded');

    }catch(\Exception $e)
    {
       return redirect()->back()->with('success',' Fail To Upload Feature ');
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
        $shop=Shop::findorfail($id);
        return view('Dashboard.shop.update',compact('shop'));
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

         'title'=>'required',
         'text'=>'required',
       
        ]);

   try{
        
        $shop=Shop::findorfail($id);

        
            $shop->title=$request->title;
              $shop->text=$request->text;
              if($request->file('image'))
              {
                $shop->image=$this->image();
              }
              
            $shop->save();

        return redirect()->route('shop.index')->with('success','Feature Updated');

     }catch(\Exception $e)
     {
        return redirect()->back()->with('success',' Fail To Upload Feature ');
     }
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
        Shop::destroy($id);
        return redirect()->route('shop.index')->with('success','Feature Deleted');
        }catch(\Exception $e)
         {
          return redirect()->back()->with('success',' Fail To Upload Feature ');
       }
    }
}
