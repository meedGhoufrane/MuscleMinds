<?php

// app/Http/Controllers/Admin/OrderController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }
}

