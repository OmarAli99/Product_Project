<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    // public function index()
    // {
    //     return view('index');
    // }

    public function category()
    {
        return view('category');
    }

    public function contact()
    {
        return view('contact');
    }
 
}
