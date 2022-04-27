<?php

namespace App\Solid;

class ArraySort{

	function arraySort($products)
	{
     
      $sub2=[];
      $sub3=[];
      $id=0 ;
      
      foreach($products as $product)
      {   

        if($id==$product['sub_id'])
        {
          $sub3[]=$product;
 
        }else
        {
          $sub2[]=$product;
        }
  
        $id=$product['sub_id'];
      }
    
      return $merged=array_merge($sub2,$sub3);
 
	}
}