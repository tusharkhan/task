<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {

        $shops = \App\Models\Shop::query()->paginate(10);

        return view('welcome', compact('shops'));
    }

    public function shopDetails($shop)
    {
        $shop = Shop::where('name', $shop)->select('id')->firstOrFail();

        $categories = Category::where('shop_id', $shop->id)->select('id')->pluck('id');

        $products = Product::with('category')
            ->whereIn('category_id', $categories)
            ->where('shop_id', $shop->id)
            ->get();

        return view('shop_detail', compact('products'));
    }
}
