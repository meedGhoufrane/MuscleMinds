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
        $totalUsers = User::count();
    
        $totalOrders = Order::count();
    
        $totalProducts = Product::count();
    
        return view('admin.dashboard', compact('totalUsers', 'totalOrders', 'totalProducts'));
    }
    
    
   
}
