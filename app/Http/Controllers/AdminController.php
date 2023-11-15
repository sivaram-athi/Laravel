<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $all = Product::all();
        $products = Product::latest()->paginate(10);
        return view("amazon.admin.admin", ["categories" => $categories, "products" => $products, "all" => $all]);
    }
    public function categorylist()
    {
        $categories = Category::paginate(10);
        $products = Product::latest()->paginate(10);
        return view("amazon.admin.adminCategory", ["categories" => $categories, "products" => $products]);
    }

    public function add()
    {
        $categories = Category::all();
        $category = Category::first();
        $products = Product::all();
        return view("amazon.admin.addProduct", ["categories" => $categories, "products" => $products, "all" => $category]);
    }

    public function addcategory()
    {
        $categories = Category::all();
        $products = Product::all();
        return view("amazon.admin.addCategory", ["categories" => $categories, "products" => $products]);
    }

    public function store(Request $request)
    {
        $categories = Category::find(['id' => $request->category_id])->first();
        $attributes = request()->validate([
            'category_id' => ['required'],
            'product_name' => ['string', 'required'],
            'product_image' => ['file'],
            'product_description' => ['string', 'required'],
            'product_price' => ['required', 'string'],
            'quantity' => ['required']
        ]);
        $attributes['product_image'] = request('product_image')->store('products');
        $attributes['category_name'] = $categories->category_name;
        Product::create($attributes);
        return back()->with('success', 'inserted successfully');
    }

    public function storeCategory(Request $request)
    {
        $attribute = request()->validate([
            'category_name' => ['string', 'required'],
            'title' => ['string'],
        ]);
        Category::create($attribute);
        return back()->with('success', 'created successfully');
    }
    public function statusUpdate(Request $request)
    {
        $status = $request->status;

        $products = Product::where('id', $request->id)->pluck('status');
        foreach ($products as $product) {
            if ($product == 0) {
                $attribute = 1;
            } else {
                $attribute = 0;
            }
        }
        Product::where('id', $request->id)->update(['status' => $attribute]);
        $prod = Product::where('id', $request->id)->pluck('status');
        foreach ($prod as $pro) {
            $key = $pro;
        }
        return response()->json($key);
    }

    public function edit(Request $request)
    {
        $categories = Category::all();
        $product = DB::table('amazon_products')->where('id', $request->id)->first();
        return view('amazon.admin.edit', ["categories" => $categories, "product" => $product]);
    }

    public function categoryedit(Request $request)
    {
        $categories = Category::all();
        $category = Category::where("id", $request->id)->first();
        return view('amazon.admin.categoryedit', ["categories" => $categories, "category" => $category]);
    }

    public function update(Request $request)
    {
        $categories = Category::find(['id' => $request->category_id])->first();
        $attributes = request()->validate([
            'category_id' => ['required'],
            'product_name' => ['string', 'required'],
            'product_image' => ['file'],
            'product_description' => ['string', 'required'],
            'product_price' => ['required', 'string'],
            'quantity' => ['required'],

        ]);
        $attributes['product_image'] = request('product_image')->store('products');
        $attributes['category_name'] = $categories->category_name;
        Product::where('id', $request->id)->update($attributes);
        return redirect('/amazon/admin');
    }
    public function destroy(Request $request)
    {

        $del = Product::where('id', $request->id)->first();
        $image = "./storage/$del->product_image";
        unlink($image);
        $pro = Product::where('id', $request->id)->delete();

        return response()->json($pro);
    }

    public function categoryupdate(Request $request)
    {
        $attribute = request()->validate([
            'category_name' => ['string', 'required'],
            'title' => ['string'],
        ]);
        Category::where('id', $request->id)->update($attribute);
        return redirect('/amazon/admin/category');
    }
    public function delete(Request $request)
    {
        $cat = Category::where('id', $request->id)->delete();
        return response()->json($cat);
    }

    public function adminSearch(Request $request)
    {
        $categories = Category::all();

        Session(['search' => $request->product]);

        if ($request->category == 'All') {
            if (isset($request->product)) {
                $product = Product::where('product_name', 'like', "%{$request->product}%")->orWhere('category_name', 'like', "%{$request->product}%")->paginate(10);
                return view('amazon.admin.adminSearch', [
                    'categories' => $categories,
                    'products' => $product
                ]);

            } elseif (isset($request->category)) {
                $product = Product::latest()->paginate(10);
                return view('amazon.admin.adminSearch', [
                    'categories' => $categories,
                    'products' => $product
                ]);
            }
        } else {
            if ($request->category !== '') {
                $product = Product::where([['product_name', 'like', "%{$request->product}%"], ['category_id', $request->category]])->orWhere('category_name', 'like', "%{$request->category}%")->paginate(10);
                return view('amazon.admin.adminSearch', [
                    'categories' => $categories,
                    'products' => $product
                ]);
            }
        }
        return view('amazon.category', [
            'categories' => $categories,
        ]);
    }

    public function userlist()
    {
        $categories = Category::all();

        $users = User::latest()->paginate(10);
        return view('amazon.admin.showUser', ['users' => $users, 'categories' => $categories]);
    }

}
