<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('shop')->orderBy('id', 'desc')->paginate(10);

        return view('merchant.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Shop::all();

        return view('merchant.category.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $categoryCreateRequest)
    {
        if( Category::create($categoryCreateRequest->validated()) )
            return redirect()->route('merchant.category.list')->with('success', 'Category created successfully');

        return  redirect()->route('merchant.category.create')->with('error', 'Category created failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
