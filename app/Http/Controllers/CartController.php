<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;

class CartController extends Controller
{
    public function addProductToCart($productid){

        $users = auth()->user()->id;
        $newCart = Cart::where('user_id', $users)->where('product_id', $productid)->first();
        if($newCart){
            $newCart->quantity += 1;
            $newCart->save();
        }else{
            $newCart = new Cart();
            $newCart->user_id = $users;
            $newCart->product_id = $productid;
            $newCart->quantity = 1;
            $newCart->save();
        }
        return redirect()->route('cart');
    }

    public function removeProductFromCart($productid){
        $cart = Cart::findOrFail($productid)->delete();
        return redirect()->route('cart');
    }

    public function completeOrder(){
        $cart = Cart::all();
        return view('products.completeOrder',[
            'carts' => $cart
        ]);
    }

    public function storeOrder(Request $request){
        $request->validate([
            'name' => ['required' , 'max:50'],
            'email' => 'required',
            'phone' => 'required',
        ]);
        $newOrder = new Order();
        $newOrder->name = $request->name;
        $newOrder->email = $request->email;
        $newOrder->phone = $request->phone;
        $newOrder->address = $request->address;
        $newOrder->note = $request->note;

        $users = auth()->user()->id;
        $newOrder->user_id = $users;

        $newOrder->save();

        $newCart = Cart::where('user_id', $users)->get();
        foreach($newCart as $item){
            $orderDetails = new OrderDetail();
            $orderDetails->product_id = $item->product_id;
            $orderDetails->price = $item->product->price;
            $orderDetails->quantity = $item->quantity;
            $orderDetails->order_id = $newOrder->id;
            $orderDetails->save();
        }

        Cart::where('user_id', $users)->delete();

        $category = Category::all();
         return view('welcome',[
            'categories' => $category
         ]);
    }

    public function previousOrders(){
        $users = auth()->user()->id;
        $order = Order::with('orderdetails')->where('user_id', $users)->get();
        return view('products.previousOrders',[
            "orders" => $order
        ]);
    }
}
