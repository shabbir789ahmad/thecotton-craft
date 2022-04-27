<?php


namespace App\Solid;
use App\Models\Product;
use DB;
class SingleProductResponsibility{



  static function products()
  {
     $query= Product::
        leftjoin('reviews','products.id','=','reviews.review_id')
      ->select('reviews.review_id', \DB::raw('avg(rating) as rating'),'products.id','products.name','products.discount','products.price','products.created_at','products.currency','products.sub_id','products.product_category','products.product_discount')
      ->groupBy('review_id','products.id','products.name','products.discount','products.price','products.created_at','products.currency','products.sub_id','products.product_category','products.product_discount')
      
      ->where('products.total','>',0)->orderBy(DB::raw('RAND()'));
      return $query;
  }

	static function  getProduct()
	{
		
     $query=self::products();
  
      $products=$query->orderBy('rating','DESC')->get();
   
      return $products;
	}


    static function  getProduct2()
    {
        
      $query=self::products();
      $products2=$query->whereIn('products.sub_id',[28,26,27,33,20,22,18,19,11])->where('products.product_category','=','new')->get();
  
      return $products2;
    }
}

?>