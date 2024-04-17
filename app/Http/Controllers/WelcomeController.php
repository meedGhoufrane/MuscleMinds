<?php

namespace App\Http\Controllers;

use App\Models\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'Preworkout')
                            ->skip(1) 
                            ->take(1) 
                            ->first();

       
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', 'iso')
                            ->get();

        $brandName = 'max Titanuem';
        $productsByBrandAndCategory = Product::whereHas('brand', function ($query) use ($brandName) {
            $query->where('name', $brandName);
        })
        ->whereHas('category', function ($query) {
            $query->where('name', 'haydro');
        })
        ->take(3)
        ->get();
        
        
        return view('welcome', compact('product', 'products','productsByBrandAndCategory'));
    }

    
    
    

    

}
