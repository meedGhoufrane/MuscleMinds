<?php

namespace App\Http\Controllers;

use App\Models\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'Preworkout')
                            ->skip(1) // Skip the first matching record
                            ->take(1) // Take the next (second) matching record
                            ->first();

        
        
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'iso')
                            ->get();
        
        return view('welcome', compact('product', 'products'));
    }

}
