<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BuyController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $num = Cart::where('user_id', auth()->user()->id)->count();
        $old_cartItems = Cart::with('product')->where("user_id", auth()->user()->id)->get();
        foreach ($old_cartItems as $cartItem) {
            if (!Product::where('id', $cartItem->product_id)->where('quantity', '>=', $cartItem->product_quantity)->exists()) {
                $removeItem = Cart::where('user_id', auth()->user()->id)->where('product_id', $cartItem->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::with('product')->where("user_id", auth()->user()->id)->get();
        return view('amazon.buy', [
            'cartItems' => $cartItems,
            'categories' => $categories,
            'num' => $num
        ]);
    }

    public function order(Request $request)
    {
        $cartItems = Cart::with('product')->where("user_id", auth()->user()->id)->get();
        foreach ($cartItems as $cartItem) {
            Buy::create([
                'product_id' => $cartItem->product_id,
                'user_id' => auth()->user()->id,
                'qty' => $cartItem->product_quantity,
                'price' => $cartItem->product->product_price * $cartItem->product_quantity,
                'original_price' => $cartItem->product->product_price,
            ]);
            $prod = Product::where('id', $cartItem->product_id)->first();
            $prod->quantity = $prod->quantity - $cartItem->product_quantity;
            $prod->update();
        }
        $cartItem = Cart::with('product')->where("user_id", auth()->user()->id)->delete();
        return redirect('/amazon');
    }

    public function singleBuy(Request $request)
    {
        $categories = Category::all();
        $product = Product::where('id', $request->id)->first();
        $num = Cart::where('user_id', auth()->user()->id)->count();
        return view('amazon.singleBuy', [
            'categories' => $categories,
            'num' => $num,
            'product' => $product,
        ]);
    }

    public function singleOrder(Request $request)
    {
        // dd($request->all());
        if ($request->qty > 0) {
            if ($request->qty < $request->product_quantity) {
                Buy::create([
                    'product_id' => $request->product_id,
                    'user_id' => $request->user_id,
                    'qty' => $request->qty,
                    'price' => $request->original_price * $request->qty,
                    'original_price' => $request->original_price,
                ]);
                $prod = Product::where('id', $request->product_id)->first();
                $prod->quantity = $prod->quantity - $request->qty;
                $prod->update();

                return redirect('/amazon');
            } else {
                return view('amazon.singleBuy')->withMessage($request->product_quantity . ' only left');
            }

        } else {
            return redirect('/amazon');
        }

    }

    public function buyingOrder()
    {
        if (auth()->user()) {
            $categories = Category::all();
            $num = Cart::where('user_id', auth()->user()->id)->count();
            $orders = Buy::with('products')->where('user_id',auth()->user()->id)->latest()->paginate(3);
            // dd($orders);
            return  view('amazon.orders',[
                'categories' => $categories,
                'num' => $num,
                'orders'=> $orders
            ]);
        }
    }
}
