<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $products = Product::where('user_id' ,)->paginate(4);
        // return view('index',compact('products'));
    }
    public function myproducts()
    {
       if (Auth::check())
         {
        $products = Product::where('user_id' ,Auth::id())->paginate(4);
        return view('showallproduct',compact('products'));
      
       }
         return to_route('login');
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
        return view('singleproduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
         // التأكد من الملكية
        if ($product->user_id !== Auth::id()) {
            abort(403, 'غير مسموح لك بتعديل هذا المنتج');
        }

        $categories = Category::all(); 
        return view('editproduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 1. التأكد من الملكية
        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        // 2. التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 3. تحديث البيانات الأساسية
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        // 4. معالجة الصورة إذا رفعت واحدة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            // رفع الجديدة
            $product->image = $request->file('image')->store('products', 'public');
        }

        // 5. حفظ كل شيء في قاعدة البيانات
        $product->save();

        // 6. العودة لجدول المنتجات مع رسالة نجاح
        return redirect()->route('my_product')->with('successedit', 'Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
          //  1. التأكد أن المستخدم الحالي هو صاحب المنتج (اختياري للأمان)
        if ($product->user_id !==Auth::id()) {
            abort(403);
        }

        // 2. حذف الصورة من مجلد التخزين إذا كانت موجودة
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // 3. حذف سجل المنتج من قاعدة البيانات
        $product->delete();

        // 4. إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('successdel', 'Product deleted successfully!');
    }
}
