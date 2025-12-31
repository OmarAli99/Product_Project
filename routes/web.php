<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Theme routes
Route::controller(ThemeController::class)->prefix('theme')->name('theme.')->group(function() 
{
//    Route::get('/index','index')->name('index');
    Route::get('/category','category')->name('category');
    Route::get('/contact','contact')->name('contact');

});
// Routes of scheme database
Route::post('/script/store',[ScriptController::class,'store'])->name('script.store');
Route::post('/con/store',[ContactController::class,'store'])->name('con.store');
// Route::post('/pro/store',[ProductController::class,'store'])->name('product.store');

//get
Route::resource('products', ProductController::class);
// Route::get('/product/create',[ProductController::class,'create'])->name('pro.create');
// Route::get('/product/index',[ProductController::class,'index'])->name('pro.index');
Route::get('/', [ProductController::class, 'index'])->name('theme.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
