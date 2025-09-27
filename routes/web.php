<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
// Route::get('/', function () {

//     // $result = DB::table('categories')->get(); // => select * from categories
//     // $result = DB::table('categories')->where('name', 'cameras')->get();// select * from cotegories where name = cameras
//     $result  = Category::all(); // select * from categories;
//     return view('welcome', ['categories' => $result]);
// });


// Route::get('product', function(){
//     $data = DB::table('product')->get();
//     return view('product', ['product' => $data]);
// });



// Route::get('/product/{catid?}', function($catid = null){
//     if($catid){
//         // $data = DB::table('product')->where('category_id', $catid)->get(); //=> Query Builder
//         $data = Product::where('category_id', $catid)->get();
//         return view('product', ['product' => $data]);
//     }else{
//         $data = Product::all();
//         return view('product', ['product' => $data]);
//     }
// })->name('product.id');


// Route::get('/category', function(){
//     $categories = Category::all();
//     $products = Product::all();
//     return view('category',['category' => $categories, 'product' => $products]);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [FirstController::class, 'MainPage']);
Route::get('/product/{catid?}', [FirstController::class, 'ProductPage'])->name('product.id');
Route::get('category', [FirstController::class, 'CategoryPage']);

Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('add.product');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');


Route::get('/removeproduct/{productid?}' , [ProductController::class,'removeProduct'])->name('remove.product');
Route::get('/editproduct/{productid?}', [ProductController::class,'editProduct'])->name('edit.product');
Route::get('/review', [FirstController::class , 'reviews'])->name('add.review')->middleware('auth');
Route::get('/about', [FirstController::class, 'about'])->name('about');
Route::post('/storeReview', [FirstController::class, 'storeReview'])->name('review.store');
Route::post('/searchProduct', [ProductController::class , 'searchProduct'])->name('product.search');


