<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\ImageTrait;
class MainController extends Controller
{
    use ImageTrait;

  public function index()
  {
    $categories=Category::all();
    return view('Dashboard.main.index',compact('categories'));
  }

  public function create()
  {
  
    return view('Dashboard.main.create');
  }

  function store(Request $req)
  {
    $req->validate([
     'category'=>'required',
    
    ]);
    $main=new Category;
    $main->category=$req->category;
    $main->category_image=$this->image();
    
    $main->save();
    return redirect()->route('category.index')->with('success','Main Category has been Uploaded');
  }

 
  function edit($id)
  {
    $main=Category::findorfail($id);
   return view('Dashboard.main.main_update',compact('main'));
  }

  function update(Request $req,$id)
   {
    $req->validate([
     'category'=>'required',
     
    ]);

    

     $main=Category::findorfail($id);
    $main->category=$req->category;
   if($req->file('image'))
    {
      $main->category_image=$this->image();
    }
    
   
    $main->save();
    return redirect()->route('category.index')->with('success','Main Category has been Updated');
  }


  function destroy($id)
  {
    $main=Category::destroy($id);
    
   

    return redirect()->back()->with('success',"Main Category has been Deleted");
  }

}
