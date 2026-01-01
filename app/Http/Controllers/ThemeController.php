<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('index',compact('products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id' , $id)->paginate(4);
        return view('category',compact('products'));
    }

    public function contact()
    {
        return view('contact');
    }
 
}
