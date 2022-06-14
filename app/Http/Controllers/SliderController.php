<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductSize;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Mainpage;
use App\Models\Image;
use App\Models\Submenue;
use App\Models\Shop;
use Carbon\carbon;
use DB;
use App\Http\Traits\ProductTrait;
use App\Solid\SingleProductResponsibility;
use App\Solid\ArraySort;
class SliderController extends Controller
{
   
   use ProductTrait;
   protected $product;
   protected $sort;
   function __construct(SingleProductResponsibility $product,ArraySort $sort)
   {
    $this->product=$product;
    $this->sort=$sort;
   }


   function index()
   {

    $slider=$slider=Slider::sliders();

    return view('Dashboard.slider.index',compact('slider'));
   }


  function create()
  {
    $categories=Submenue::all();
   return view('Dashboard.slider.upload_slider',compact('categories'));
  }
 
  function store(Request $request)
  {
    
    $request->validate([
     'image'=>'required',
     'tag'=>'required|max:12',
      'heading'=>'required|max:20',
      'detail'=>'required|max:120',
      'category_id'=>'required',
    
    ]);

    if($request->hasfile('image'))
    {
       $slider=new Slider;
      $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->image=$filename;
    }
    
    try{
      $slider->tag=$request->tag;
      $slider->heading=$request->heading;
      $slider->detail=$request->detail;
      $slider->category_id=$request->category_id;
      $slider->show=1;
    $slider->save();

    return redirect()->route('slider.index')->with('success','Slider has been Uploaded');
  }catch(\Exception $e)
  {
    return redirect()->back()->with('success','Fail to Upload');
  }
  }


  function edit($id)
  {
    $slider=Slider::findorfail($id);
    $subcategories=Submenue::all();
    return view('Dashboard.slider.slider_update',compact('slider','subcategories'));
  }



 

  

  function destroy($id)
  {
    $slider=Slider::destroy($id);
    
    return redirect()->back()->with('success',"Slider has been Deleted");
  }
 

  function update(Request $req,$id)
   {
    $req->validate([
  
      'tag'=>'required|max:12',
      'heading'=>'required|max:20',
      'detail'=>'required|max:120',
    ]);

     $slider=Slider::findorfail($id);
    
    if($req->hasfile('image'))
    {
      
         $file=$req->file('image');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $slider->image=$filename;
    }
    
    $slider->tag=$req->tag;
      $slider->heading=$req->heading;
      $slider->detail=$req->detail;
      $slider->show=$req->show;
      $slider->category_id=$req->category_id;
    $slider->save();
    return redirect()->route('slider.index')->with('success','Slider has been Updated');
  }


  function showHide(Request $request)
  {
    $slider=Slider::findorfail($request->id);
    $slider->show=$request->value;
    $slider->save();
    return response()->json('success');
  }



 function  women()
  {
        
        $slider=Slider::sliders();
     
      //from solid directory 
      $products=$this->product->getProduct();
 
      //new arriaval
      $products2=$this->product->getProduct2();

      //from producttrait
      $products=$this->getImage($products); 
      $products2=$this->getImage($products2); 
   
      //array sort product
      // from array sort class
      
      $products=$this->sort->arraySort($products);
      $products2=$this->sort->arraySort($products2);
    
      $shops=Shop::latest()->take(4)->get();
      $categories=Category::category2();

    return view('home',compact('slider','products','shops','products2','categories'));
  }

 


 function  seeAll($id,Request $req)
  {
    
    $now=Carbon::now();
    $new="";

    if($req->get('new2') !== Null)
    {
        $new=$req->get('new2');
    }
 
    $query= Category::
      join('products','categories.id','=','products.cat_id')
      ->leftjoin('reviews','products.id','=','reviews.review_id')
      ->select('reviews.review_id', \DB::raw('avg(rating) as rating'),'products.id','products.name','products.discount','products.price','products.created_at','products.currency','products.product_category','products.product_discount')
      ->groupBy('review_id','products.id','products.name','products.discount','products.price','products.created_at','products.currency','products.product_category','products.product_discount')
     
      ->where('products.total','>',0);

     
     if($id==1)
     {
      $query=$query->where('products.product_category','new') ->orderBy('rating','DESC');
     }

     if($id==2)
     {
      $query=$query->where('products.product_category' ,'=', 'promo');
     }
    
     if($id==4)
     {
      $query=$query->where('rating' ,'>=', 3);
     }


  
     if($req->get('brand') !== Null)
       {
        $query=$query->join('stores','products.id','=','stores.brand_id')->where('brand',$req->get('brand'));
        }

       if($req->get('size2') !== Null)
        {
        $query=$query->join('sizes','products.id','=','sizes.size_id')->where('sizes.size',$req->get('size2'));
        }
          
        if($req->get('price') !== Null)
        {
         
        $query=$query->whereBetween('products.price',[0,$req->get('price')]);
        }

        if($req->get('category_id') !== Null )
        {
         
        $query=$query->where('products.cat_id','=',$req->get('category_id'));
        }

        if($req->get('sub_category_id') !== Null )
        {
         
        $query=$query->where('products.sub_id','=',$req->get('sub_category_id'));
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

        if($req->search)
        {
            $query=$query->where('products.name', 'like','%'.$req->search.'%');
        }

      $products=$query->get();
    
     foreach($products as $pro)
     {
      $pro->image=Image::where('image_id',$pro->id)->take(2)->get();
     }
    
    $sizes=ProductSize::all();
    $categories=Category::category2();
    $brand=Brand::all();
   
    return view('seeall',compact('products','sizes','brand','categories'));
  }



  function search(Request $req)
  {
    $search=$req->search;
    $search2=Product::join('images','products.id','=','images.image_id')
    ->where('name','LIKE',"%{$search}%")->get();
  //dd($search2);
    return view('search',compact('search2'));
  }


}
