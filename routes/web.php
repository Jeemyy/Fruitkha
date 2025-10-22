<?php

use App\Http\Controllers\AddProductImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductImageController;
use App\Http\Middleware\Customauth;
use App\Http\Middleware\SetLocal;
use GuzzleHttp\Psr7\Request;

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


Route::get('/', [FirstController::class, 'MainPage'])->name('mainpage');
Route::get('/product/{catid?}', [FirstController::class, 'ProductPage'])->name('product.id')->middleware(Customauth::class);
Route::get('category', [FirstController::class, 'CategoryPage']);

Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('add.product')->middleware('auth');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');


Route::get('/removeproduct/{productid?}' , [ProductController::class,'removeProduct'])->name('product.remove');
Route::get('/editproduct/{productid?}', [ProductController::class,'editProduct'])->name('product.edit');
Route::get('/review', [FirstController::class , 'reviews'])->name('add.review')->middleware('auth');
Route::get('/about', [FirstController::class, 'about'])->name('about');
Route::post('/storeReview', [FirstController::class, 'storeReview'])->name('review.store');
Route::post('/searchProduct', [ProductController::class , 'searchProduct'])->name('product.search');

Route::get('/producttable' , [ProductController::class, 'productTable'])->name('product.table');

// Cart
Route::get('/cart', [FirstController::class, 'getCart'])->name('cart')->middleware('auth');
Route::get('/addproducttocart/{productid}', [CartController::class, 'addProductToCart'])->name('cart.add')->middleware('auth');
Route::get('/removeProductFromCart/{productid}', [CartController::class, 'removeProductFromCart'])->name('cart.remove');
Route::get('/previousOrders', [CartController::class, 'previousOrders'])->name('product.previous')->middleware('auth');

// Complete Order
Route::get('/order', [CartController::class, 'completeOrder'])->middleware('auth')->name('completeOrder');
Route::post('/storeOrder', [CartController::class, 'storeOrder'])->middleware('auth')->name('product.storeOrder');


Route::get('/addProductImage/{productid}', [ProductImageController::class, 'addProductImage']);
Route::get('/removeImageProduct/{productid}', [ProductImageController::class, 'removeProductImage'])->name('remove.productImage');
// add image to product Table
Route::post('/storeProductImage', [ProductImageController::class, 'storeProductImage'])->name('product.addImage');

// show Singel Product
Route::get('/singleProduct/{porductid}', [ProductController::class, 'singleProduct'])->name('product.single');


// Route For Select Language

Route::post('/lang/{local}', function($local){
// $local = 'ar' => 'local' = $local;
    session()->put('local' , $local);
    return redirect()->back();
})->name('goBack');
