<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $merchants = \App\Models\Merchant::query()->paginate(10);
        return view('welcome', compact('merchants'));
    }
}
