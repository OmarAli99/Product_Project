<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Subcategory extends Model
{
    protected $fillable = ['name' ];

    public function categorys()
    {
       return $this->hasMany(Category::class);

    }

}
