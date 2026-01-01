<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Theme routes
Route::controller(ThemeController::class)->prefix('theme')->name('theme.')->group(function() 
{
    Route::get('/index','index')->name('index');
    Route::get('/category/{id}','category')->name('category');
    Route::get('/contact','contact')->name('contact');

});
// Routes of scheme database
Route::post('/script/store',[ScriptController::class,'store'])->name('script.store');
Route::post('/con/store',[ContactController::class,'store'])->name('con.store');

//get
Route::resource('products', ProductController::class);


Route::get('/my_products' ,[ProductController::class,'myproducts'])->name('my_product')->middleware('auth');
Route::post('/destroy' ,[ProductController::class,'destroy'])->name('products.destroy')->middleware('auth');
Route::get('/edit' ,[ProductController::class,'edit'])->name('products.edit')->middleware('auth');
Route::post('/rate',[RateController::class,'rate'])->name('myrate');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
