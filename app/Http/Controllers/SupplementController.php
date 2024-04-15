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
        // Retrieve filter values from the request
        $category = $request->input('category');
        $name = $request->input('name');
        $price = $request->input('price');

        // Query products table based on filter values
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

        // Retrieve filtered products
        $filteredProducts = $query->get();

        // Return filtered products as JSON data
        return response()->json($filteredProducts);
    }

    
}
