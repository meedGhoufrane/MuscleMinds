<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    public function index()
    {
        // Total number of users
        $totalUsers = User::count();
    
        // Total number of orders
        $totalOrders = Order::count();
    
        // Total number of products
        $totalProducts = Product::count();
    
        return view('admin.dashboard', compact('totalUsers', 'totalOrders', 'totalProducts'));
    }
    
    

}
