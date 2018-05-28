<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // $category -> Products
    public function products()
     {

     	return $this->hasMany(Product::class);
     }


}
