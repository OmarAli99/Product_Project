<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Product;


class Category extends Model
{
    protected $fillable = ['name','subcategory_id'];
    
    public function subcategorys()
    {
       return $this->hasMany(Subcategory::class ,'subcategory_id' );

    }
    public function products()
    {
       return $this->hasMany(Product::class);

    }

}
