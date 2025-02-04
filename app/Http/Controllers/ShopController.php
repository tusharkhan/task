<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::query()->orderBy('id', 'desc')->paginate(10);
        return view('merchant.shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreateRequest $storeCreateRequest)
    {
        $insertData = [
            'name' => $storeCreateRequest->name,
            'slug' => Str::slug($storeCreateRequest->name, '_'),
            'password' => Hash::make($storeCreateRequest->password),
            'merchant_id' => Auth::guard('merchant')->user()->merchant_id
        ];

        if (Shop::create($insertData))
            return redirect()->route('merchant.shop.list')->with('success', 'Shop created successfully.');

        return redirect()->route('shop.index')->with('error', 'Something went wrong.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
