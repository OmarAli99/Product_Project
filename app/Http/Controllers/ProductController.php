<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('addnewproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', 
            'user_id' => 'required|exists:users,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $imagePath = null;
        if ($request->hasFile('image'))
        {
        $imagePath = $request->file('image')->store('products', 'public');
        }
        $product = Product::create([
            'name' => $request->name,
            'description' =>$request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id'=> $request->user_id,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'تم إضافة المنتج بنجاح!');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
