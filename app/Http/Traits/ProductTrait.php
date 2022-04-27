<?php

namespace App\Http\Traits;
use App\Models\Image;
trait ProductTrait
 {

  
   function getImage($products)
   {
      foreach($products as $pro)
     {
      $pro->image=Image::where('image_id',$pro->id)->take(2)->get();
     }

     return $products;
   }


 

 }

?>