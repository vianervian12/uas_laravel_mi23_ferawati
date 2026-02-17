<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = \App\Models\Product::count();
        $totalCategories = \App\Models\Category::count();
        $totalUsers = \App\Models\User::count();

        return view('dashboard.index', compact('totalProducts', 'totalCategories', 'totalUsers'));
    }
}
