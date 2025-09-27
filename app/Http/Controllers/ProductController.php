<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $allCategories = Category::all();
        return view('products.addproduct' , ['allcategories' => $allCategories]);
    }
    public function store(Request $request){
            $request->validate([
                'name' => ['required' ,'unique:products', 'max:50'],
                'price' => 'required',
                'quantity' => 'required',
                'category_id' => 'required',
                'photo' => 'image|mimes:jpg,png,jpeg',
            ]);

        if($request->id){
            $currentproduct = Product::find($request->id);
            $currentproduct->name = $request->name;
            $currentproduct->price = $request->price;
            $currentproduct->quantity = $request->quantity;
            $currentproduct->description = $request->description;
            $imagepath = time().$request->photo->extension(); // like 12-9-2003.jpg
            $path = $request->photo->move('uploads',$imagepath);
            $currentproduct->imagepath = $path;
            $currentproduct->category_id = $request->category_id; // Default category ID, change as needed
            $currentproduct->save();
        }else{
            $productData = new Product();
            $productData->name = $request->name;
            $productData->price = $request->price;
            $productData->quantity = $request->quantity;
            $productData->description = $request->description;
            $imagepath = time().$request->photo->extension(); // "extention" to get the type of photo like jpg
            $path= $request->photo->move('uploads',$imagepath);
            // dd($path);
            $productData->imagepath = $path;
            $productData->category_id = 1; // Default category ID, change as needed
            $productData->save();
       }
       return redirect('product');
    }

    public function removeProduct($productid = null){
        if($productid){
            $product = Product::find($productid); // select * from Product where id =  $catid
            $product->delete();
            return redirect('product');
        }else{
            abort(403, 'this product no found');
        }
    }
    public function editProduct($productid = null){
        if($productid){
            $product = Product::findOrFail($productid);// select * from Product where id = $productid
            $categories = Category::all();// select * from Category
            // $name = request('name');
            // $price = request('price');
            // $quantity = request('quantity');
            // $description = request('description');
            return view('products.editproduct' , ['product' => $product , 'allcategories' => $categories]);
        }else{
            return redirect('addProduct');
        }
    }

    public function searchProduct(Request $request){
        $product = Product::where('name','like','%' . $request->searchkey.'%')->get();
        // dd($product);

        return view('/product',['product' => $product]);
    }

}

