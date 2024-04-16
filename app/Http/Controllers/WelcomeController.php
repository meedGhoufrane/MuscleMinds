<?php

namespace App\Http\Controllers;

use App\Models\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch one product where the category is "preworkout"
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'Preworkout')
                            ->first();
        
        
        // Fetch other products where the category is "iso"
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'iso')
                            ->get();
        
        return view('welcome', compact('product', 'products'));
    }

}
