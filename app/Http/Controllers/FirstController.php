<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class FirstController extends Controller
{
    function MainPage(){
        $result  = Category::all(); // select * from categories;
        $reviews = Review::all();
        return view('welcome', ['categories' => $result, 'reviews' => $reviews]);
    }

    function ProductPage($catid = null){
        if($catid){
        // $data = DB::table('product')->where('category_id', $catid)->get(); //=> Query Builder
        $data = Product::where('category_id', $catid)->get();
        return view('product', ['product' => $data]);
        }else{
            // abort(403,'This page without an ID for page');  //=> To print Error Massage
            // $products = Product::all();  //=> select * from Product;
            $products = Product::paginate(6);
            return view('product',['product' => $products]);
        }
    }

    function CategoryPage(){
        $categories = Category::all();
        $products = Product::all();
        return view('category',['category' => $categories, 'product' => $products]);
    }

    public function reviews(){
        return view('review');
    }
    public function About(){
        $reviews = Review::all();
        return view('/about', ['reviews' => $reviews]);
    }
    public function storeReview(Request $request){
        $request->validate([
            'name' => ["required", 'max:50'],
            'email' => 'required',
            'message' => 'required'
        ]);
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone = $request->phone;
        $review->subject = $request->subject;
        $review->message = $request->message;
        $review->save();

        $reviews = Review::all();
        return view('about',['reviews' => $reviews]);
    }
}
