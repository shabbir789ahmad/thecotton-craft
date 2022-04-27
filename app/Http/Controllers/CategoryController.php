<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Dropdown;
use App\Models\Submenue;
use App\Http\Traits\ImageTrait;
class CategoryController extends Controller
{
    use ImageTrait;


    function allCategory($id)
    {
        $subcategory =Submenue::where('menue_id',$id)->get();

       return view('allcategory',compact('subcategory'));
    }

    function getCat()
    {   
    
     $maincat=Category::category();
        
    return view('Dashboard.category.category_uploads',compact('maincat'));
    }


     function showCat()
    {   
    
     $showcat=Category::
          join('submenues','categories.id','=','submenues.menue_id')
            ->select('submenues.id','categories.category','submenues.menue_id','submenues.smenue','submenues.menue_image')
          ->get();
        //dd($showcat);
    return view('Dashboard.category.category_show',compact('showcat'));
   
    }

    

    //upload category
   
    
    
    
  
}
