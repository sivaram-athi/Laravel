<?php

namespace App\Http\Controllers;

// use App\cart;
use App\Cart;
use App\Product;
use App\Category;
use App\Jobs\trending;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function find(Request $request)
    {
        Session(['path' => $request->path()]);
        if (auth()->user()) {
            $num = Cart::where('user_id', auth()->id())->count();
        } else {
            $num = 0;
        }

        Session(['search' => $request->product]);
        Session(['category' => $request->category]);

        $categories = Category::all();

        if ($request->category == 'All') {
            if (isset($request->product)) {
                $product = Product::where([['product_name', 'like', "%{$request->product}%"], ['status', 1]])->orWhere([['category_name', 'like', "%{$request->product}%"], ['status', 1]])->paginate(10);
                return view('amazon.category', [
                    'categories' => $categories,
                    'products' => $product,
                    'num' => $num
                ])->withMessage($request->product);

            } elseif (isset($request->category)) {
                $product = Product::Where('status', 1)->paginate(10);
                return view('amazon.category', [
                    'categories' => $categories,
                    'products' => $product,
                    'num' => $num
                ])->withMessage($request->product);
            }
        } else if ($request->category) {
            $product = Product::where([['category_id', $request->category], ['status', 1]])->paginate(10);
            return view('amazon.category', [
                'categories' => $categories,
                'products' => $product,
                'num' => $num
            ])->withMessage($request->category);
        } else {
            if ($request->category !== '') {
                $product = Product::where([['product_name', 'like', "%{$request->product}%"], ['category_id', $request->category], ['status', 1]])->orWhere([['category_name', 'like', "%{$request->category}%"], ['status', 1]])->paginate(10);
                return view('amazon.category', [
                    'categories' => $categories,
                    'products' => $product,
                    'num' => $num
                ])->withMessage($request->product);
            } else {
                abort(404);
            }
        }
        return view('amazon.category', [
            'categories' => $categories,
            'num' => $num
        ]);
    }
    public function list(Request $request)
    {
        Session(['path' => $request->path()]);
        if (auth()->user()) {
            $num = Cart::where('user_id', auth()->id())->count();
        } else {
            $num = 0;
        }
        $user = auth()->user();
        $categories = Category::all();
        $products = Product::find(['id' => $request->id])->first();
        if (Product::find(['id' => $request->id])->where('status', 1)->first()) {
            return view('amazon.list', [
                'categories' => $categories,
                'products' => $products,
                'user' => $user,
                'num' => $num
            ]);
        } else {
            return view('amazon.404page');
        }
    }

    public function show(Request $request)
    {
        if (auth()->user()) {
            $num = Cart::where('user_id', auth()->id())->count();
        } else {
            $num = 0;
        }
        Session(['search' => $request->product]);
        $categories = Category::all();
        $product = Product::where([['category_id', '=', $request->id], ['status', 1]])->paginate(10);
        return view('amazon.category', [
            'categories' => $categories,
            'products' => $product,
            'num' => $num
        ])->withMessage($request->product);
    }
}
