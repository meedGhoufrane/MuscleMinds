<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch products where the category is "iso"
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'iso')
                            ->get();
        return view('welcome', compact('products'));
    }
}

