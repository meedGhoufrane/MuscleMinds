<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
{
    // Total number of users
    $totalUsers = User::count();

    // Total number of products
    $totalProducts = Product::count();

    // Total number of carts
    $totalCarts = Cart::count();

    return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalCarts'));
}

}
