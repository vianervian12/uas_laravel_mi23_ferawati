<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::with('category')->latest()->get();
        return view('home', compact('products'));
    }

    public function about()
    {
        return view('about');
    }
}
