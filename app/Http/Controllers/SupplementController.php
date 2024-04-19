<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;

class SupplementController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        $products = Product::withCount('carts')->get();
        return view('supplement', ['products' => $products,'categories' => $categories]);
    }

  

    
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $name = $request->input('name');
        $price = $request->input('price');

        $query = Product::query();

        if ($category) {
            $query->where('category_id', $category);
        }

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($price) {
            $query->where('price', '<=', $price);
        }

        $filteredProducts = $query->get();

        return response()->json($filteredProducts);
    }

    
}
