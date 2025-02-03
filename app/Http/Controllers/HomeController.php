<?php

namespace App\Http\Controllers;

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
        $merchants = \App\Models\Merchant::query()->paginate(10);
        return view('welcome', compact('merchants'));
    }
}
