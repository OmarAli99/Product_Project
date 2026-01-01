<?php

namespace App\Models;
use App\Models\product;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['product_id','name','email','rate','message'];

    public function product()
    {

      return $this->belongsTo(Product::class);

    }

}
