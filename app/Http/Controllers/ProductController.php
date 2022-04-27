<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Dropdown;
use App\Models\Color;
use App\Models\Size;
use App\Models\Store;
use App\Models\Ship;
use App\Models\Review;
use App\Models\ProductColor;
use App\Models\PointDetail;
use App\Models\ProductSize;
use App\Http\Traits\ProductTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
  use ProductTrait;

    function subCategory()
    {
        
     $main = Category::category2();
     $brand = Brand::all();
     $ships = Ship::all();
     $colors = ProductColor::all();
     $sizes = ProductSize::all();
     
      return view('Dashboard.product.product_form',compact('main','brand','ships','colors','sizes'));
    }






function uploadProduct(Request $req)
 {

     $req->validate([
          'name'=>'required|max:300',
          'detail'=>'required|max:600',
          'price'=>'required',
          'total'=>'required',
         
          'brand'=>'required',
          'currency'=>'required',
          'cat_id'=>'required',
          'sub_id'=>'required',
        ]);

    
     
   DB::transaction(function() use($req)
   {
   

        $product= Product::create([
       'name'=> $req->name,
       'price'=> $req->price,
       'currency'=> $req->currency,
       'total'=> $req->total,
       'detail'=>$req->details,
       'cat_id'=> $req->cat_id,
       'sub_id'=> $req->sub_id,
       'product_discount'=> $req->product_discount,
      
      ]);
     
   
        if($req->detail != null)
        {
          $n1 = sizeof($req->detail);
          for($i = 0;  $i < $n1; $i++)
          {

             PointDetail::create([
              'detail' =>$req->detail[$i],
              'product_id' =>$product->id,
             ]);
          }
        } 

      if($req->color)
    {
      $n1 = sizeof($req->color);
      for($i = 0;  $i < $n1; $i++)
       {

         Color::create([
        'color' =>$req->color[$i],
        'color_status' =>'1',
        'filter_id' =>$product->id,
       ]);
      }
    } 
        
     
    
    if($req->size)
    {
      $n2 = sizeof($req->size);
      for($i = 0;  $i < $n2; $i++)
       {

        $brand= Size::create([
        'size' =>$req->size[$i],
        'size_status' =>'1',
        'size_id' =>$product->id,
       ]);
      }
    } 
       $n3 = sizeof($req->brand);
    for($i = 0;  $i < $n3; $i++)
     {
        $brand= Store::create([
      'brand' =>$req->brand[$i],
      'brand_status' =>'1',
      'brand_id' =>$product->id,
      ]);
     }
  
    foreach($req->file('rimage') as $file)
     {
       Image::create([
       $ext=$file->getClientOriginalExtension(),
       $name=$file->getClientOriginalName(),
       $filename=$name,
       $file->move('uploads/img/', $filename),
       'rimage'=>$filename,
       'image_id'=> $product->id,
        ]);
      
     }
       
       
     
  });
return redirect()->route('admin.get-product')->with('success','Product Uploaded Successfully');
}



  //function for product detail 
  function productDetail($id)
  {
    $detail= Product::
         leftjoin('reviews','products.id','=','reviews.review_id')
        
        ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.detail','products.currency','products.sub_id','products.total','products.product_discount')
        ->groupBy('review_id','products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.detail','products.currency','products.sub_id','products.total','products.product_discount')

        ->orderBy('rating','DESC')->where('products.total','>',0)
        ->findorfail($id);
 
        if(!$detail)
        {
          
           return abort(404, 'Page not found.');
          
        }else{
          $images=Image::where('image_id',$id)->get();
        }

       $point_detail= PointDetail::where('product_id',$id)->get();

      
     $detail2= Product::
     leftjoin('reviews','products.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.currency','products.product_discount')
        ->groupBy('review_id','products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.currency','products.product_discount')->orderBy('rating','DESC')->where('sub_id',$detail->sub_id)->where('products.id','!=',$id)
        ->get();
        
        //from image trait
        $products=$this->getImage($detail2);

        $color= Color::where('filter_id',$id)->get();

        $size= Size::where('size_id',$id)->get();
        $brand= Store::where('brand_id',$id)->get();
        $ships=Ship::all();
        
        //get reviews
         $review_query=Review::latest()->where('review_id',$id);

         $review= $review_query->take(4)->get();
         $count= $review_query->count();
       
       
        return view('productpage',compact('detail','detail2','images','color','size','brand','ships','review','point_detail','count'));
  }  

    

  function allproduct($id, Request $req)
  {
    $brand="";
    $size="";
    $price="";
   

     $now=Carbon::now();
    
   
    
     $new="";
    if($req->get('new2') !== Null)
    {
        $new=$req->get('new2');
    }
     $price="";
    if($req->get('price') !== Null)
    {
        $price=$req->get('price');
    }

  
    $query= Product::select('products.id','products.name','products.discount','products.price','products.created_at','products.detail','products.product_discount')
       ->where('sub_id',$id)->where('products.total','>',0);
         
    

      if($req->get('brand') !== Null)
       {
        $query=$query->join('stores','products.id','=','stores.brand_id')->where('brand',$req->get('brand'));
        }

       if($req->get('size2') !== Null)
        {
        $query=$query->join('sizes','products.id','=','sizes.size_id')->where('size',$req->get('size2'));
        }
          
        if($price != null)
        {
         
        $query=$query->whereBetween('price',[0,$price]);
        }

        //sort by week and month
        
         if($new=='this')
        {
           $start = $now->startOfWeek()->format('Y-m-d H:i');
           $end = $now->endOfWeek()->format('Y-m-d H:i');
           $query=$query->whereBetween('products.created_at',[$start,$end]);
        }
        if($new=='last')
        {
       
           $query=$query->where('products.created_at','>=',Carbon::now()->subdays(15));
        }
        if($new=='month')
        {
            $query=$query->whereMonth('products.created_at', date('m'));
        }
   
         
        $query=$query->paginate(40);
   
     $product=$query;

        $product=$this->getImage($product);
     
       $sizes= ProductSize::all();
        $brand= Brand::all();
          
        
      
        return view('product',compact('product','brand','sizes'));
  }

  function getProduct(Request $req)
  {
     $main=Category::category2();
     
     $day='';
     $sub2='';
     if($req->get('days') !== Null)
     {
        $day=$req->get('days');
     }

     if($req->get('sub_category') !== Null)

     {
        $sub2=$req->get('sub_category');
     }
  
     $query= Category::
     join('products','categories.id','=','products.cat_id')
      ->select('products.id','products.name','products.detail','products.price','products.discount','products.total','products.created_at','product_category');
      if($sub2)
       {
        $query=$query->where('products.sub_id',$sub2);
        }
  
        if($day==1)
       {
        $query=$query->whereDate('products.created_at','>=',Carbon::today());
        }
        if($day==2)
       {
        $query=$query->where('products.created_at','>=', Carbon::now()->subdays(15));
        }

        if($day==3)
       {
        $query=$query->whereMonth('products.created_at','>=', Carbon::today()->month);
        }

       

        $query=$query->paginate(30);
       $product=$query;
        
        //from product trait
        $product=$this->getImage($product);
       
     
    return view('Dashboard.product.product_show',compact('product','main'));
  }



  function deleteProduct($id)
  {
    $product=Product::destroy($id);

    return redirect()->back()->with('success','Product Deleted Permanently');
  }
 
  

  function updateProduct($id)
  {
    $product=Product::findorfail($id);
    $colors=Color::where('colors.filter_id',$id)->get();
    $product_colors=ProductColor::all();
    $size=Size::where('sizes.size_id',$id)->get();
    $sizes=ProductSize::All();
    $store=Store::where('stores.brand_id',$id)->get();
    $image=Image::where('images.image_id',$id)->latest()->get();
    

    return view('Dashboard.product.product_update',compact('product','colors','size','store','image','product_colors','sizes'));
  }

  function UpdateDetail2(Request $req)
  {

    
        
      $data=Product::findorfail($req->id);
      $data->name=$req->name;
      $data->detail=$req->detail;
      $data->price=$req->price;
      $data->total=$req->total;
      $data->cat_id=$req->cat_id;
      $data->sub_id=$req->sub_id;
      $data->product_discount=$req->product_discount;
   
       
       $data->save();
  
     if($req->file('image'))
     {

       foreach($req->file('rimage') as $file)
    
     { 
      
       Image::create([
       $ext=$file->getClientOriginalExtension(),
       $name=$file->getClientOriginalName(),
       $filename=$name,
       $file->move('uploads/img/', $filename),
       'rimage'=>$filename,
       'image_id'=> $req->id,
        ]);
      
     }

   }


    
   

    return redirect()->back()->with('success','Product Updated');
  }


  function applyCategory(Request $req)
  {
    $product=Product::findorfail($req->id);
   $product->product_category=$req->product_category;
   $product->discount=$req->discount;
   $product->save();

   return redirect()->back()->with('success','Product Updated');
  }

    function colorStatus(Request $req)
  {
    $color=Color::findorfail($req->id);
   $color->color_status=$req->color_status;
   $color->save();
  }
    function sizeStatus(Request $req)
  {
    $size=Size::findorfail($req->id);
   $size->size_status=$req->size_status;
   $size->save();
  }
function brandStatus(Request $req)
  {
    $store=Store::findorfail($req->id);
   $store->brand_status=$req->brand_status;
   $store->save();
  }
}
