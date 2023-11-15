<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index(Request $request)
    {
        $carts = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->pluck('product_quantity');
        if (Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->exists()) {
            foreach ($carts as $cart) {
                if ($cart > 0) {
                    $cart = $cart + 1;
                    Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->update([
                        'product_quantity' => $cart,
                        // 'num' => $num,
                    ]);
                }
            }
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'product_quantity' => 1,
                // 'num' => $num,
            ]);
        }

        $count = Cart::where('user_id', auth()->user()->id)->count();
        // dd($count);

        return response()->json($count, 200);
    }

    public function view()
    {
        if (auth()->user()) {
            $num = Cart::where('user_id', auth()->user()->id)->count();
            $cartItems = Cart::with('product')->where("user_id", auth()->user()->id)->get();
            $categories = Category::all();
            $products = Product::all();
            $cart = Cart::join('amazon_products', 'amazon_products.id', '=', 'amazon_carts.product_id')->select('amazon_products.product_name', 'amazon_products.product_image', 'amazon_products.product_price', 'amazon_carts.product_quantity', 'amazon_products.quantity', 'amazon_carts.product_id')->where('user_id', '=', auth()->user()->id)->get();
            return view("amazon.cartPage", ["categories" => $categories, "products" => $products, "carts" => $cart, 'num' => $num]);
        } else {
            return redirect('login');
        }

    }

    public function view1()
    {
        if (auth()->user()) {
            $cart = Cart::join('amazon_products', 'amazon_products.id', '=', 'amazon_carts.product_id')->select('amazon_products.product_name', 'amazon_products.product_image', 'amazon_products.product_price', 'amazon_carts.product_quantity', 'amazon_products.quantity', 'amazon_carts.product_id')->where('user_id', '=', auth()->user()->id)->get();
            return response()->json($cart);
        } else {
            return redirect('login');
        }
    }
    public function view2(Request $request)
    {
        if (auth()->user()) {
            $carts = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->pluck('product_quantity');
            if (Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->exists()) {
                foreach ($carts as $cart) {
                    if ($cart > 0) {
                        $cart = $request->quantity;
                        Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->update([
                            'product_quantity' => $cart,
                        ]);
                    }
                }
            }
            $car = Cart::join('amazon_products', 'amazon_products.id', '=', 'amazon_carts.product_id')->select('amazon_products.product_name', 'amazon_products.product_image', 'amazon_products.product_price', 'amazon_carts.product_quantity', 'amazon_products.quantity', 'amazon_carts.product_id')->where('user_id', '=', auth()->user()->id)->get();
            return response()->json($car);
        } else {
            return redirect('login');
        }
    }

    public function view3(Request $request)
    {
        if (auth()->user()) {
            Cart::where('product_id', $request->id)->delete();
            $cart = Cart::join('amazon_products', 'amazon_products.id', '=', 'amazon_carts.product_id')->select('amazon_products.product_name', 'amazon_products.product_image', 'amazon_products.product_price', 'amazon_carts.product_quantity', 'amazon_products.quantity', 'amazon_carts.product_id')->where('user_id', '=', auth()->user()->id)->get();
            return response()->json($cart);
        } else {
            return redirect('login');
        }
    }

}
