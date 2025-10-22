<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhoto;
class ProductImageController extends Controller
{
    //
    public function addProductImage($productid){
        $product = Product::find($productid);
        $getImage = ProductPhoto::where('product_id', $productid)->get();
        // dd($getImage);
        return view('products.addProductImage', [
            'product' => $product,
            'getImage' => $getImage
        ]);
    }

    public function removeProductImage($productid = null){
        if($productid != null){
            $product = ProductPhoto::find($productid)->delete();
            $products = ProductPhoto::find($productid);
            return redirect('/product');
        }else{
            abort(403, 'Enter Image Id you need to delete');
        }
    }

    public function storeProductImage(Request $request){
        $request->validate([
            'product_id' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg',
        ]);

        $storeImage = new ProductPhoto();
        $storeImage->product_id = $request->product_id;

        if($request->hasFile('photo')){
            $imageName = time().".".$request->photo->extension();
            $path = $request->photo->move(public_path('uploads'), $imageName);
            $storeImage->imagepath = 'uploads/' . $imageName;
        }
        $storeImage->save();
        return redirect('/producttable');
    }

}
