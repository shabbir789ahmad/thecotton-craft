<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships=Ship::all();
        return view('Dashboard.ship.index',compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Dashboard.ship.create');
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

         'city'=>'required',
         'shipping_cost'=>'required',
         
        ]);

   try{
        Ship::create([

              'city'=>$request->city,
              'shipping_cost'=>$request->shipping_cost,
           
        ]);

        return redirect()->route('ship.index')->with('success','Feature Uploaded');

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
        $ship=Ship::findorfail($id);
        return view('Dashboard.ship.update',compact('ship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

         'city'=>'required',
         'shipping_cost'=>'required',
         
        ]);

   try{
        $data=[
              'city'=>$request->city,
              'shipping_cost'=>$request->shipping_cost,
          
     ];
        Ship::where('id',$id)->Update($data);


        return redirect()->route('ship.index')->with('success','Feature Uploaded');

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
        Ship::destroy($id);
        return redirect()->route('ship.index')->with('success','Feature Deleted');
        }catch(\Exception $e)
         {
          return redirect()->back()->with('success',' Fail To Upload Feature ');
       }
    }
}
