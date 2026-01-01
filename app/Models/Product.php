<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
class Product extends Model
{
    protected $fillable = ['name', 'description','image','price','user_id','category_id'];

    public function user()
    { 
        return $this->belongsTo(User::class,'user_id');

    }
        public function category()
    { 
        return $this->belongsTo(category::class,'category_id');

    }
    
    public function rates()
    {

      return $this->hasMany(Rate::class);

    }

     
}
