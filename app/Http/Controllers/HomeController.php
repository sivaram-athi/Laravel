<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Trend;
use App\Category;
use App\Jobs\trending;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = auth()->user();
        trending::dispatch();
        if (isset($auth)) {
            $num = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            $num = 0;
        }
        $categories = Category::all();
        $trend = Trend::with('prod')->get();
        $all = Category::all()->random(8);
        return view('amazon.home', [
            'categories' => $categories,
            'products' => $all,
            'num' => $num,
            'trends' => $trend
        ]);
    }
}
