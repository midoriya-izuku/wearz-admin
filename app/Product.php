<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
   protected $fillable = ['product_name', 'size', 'color','price'];

   protected $with = ['brand', 'type'];
   public function brand(){
      return $this->belongsTo('App\Brand');
   }

   public function type(){
      return $this->belongsTo('App\ProductType');
   }


   public function orders(){
      return $this->belongsToMany('App\Order')->withTimestamps()->withPivot('id','size','quantity','price');
   }   
}
