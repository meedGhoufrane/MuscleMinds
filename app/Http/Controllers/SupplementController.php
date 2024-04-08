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
        $products = $this->productRepository->getAll();
        return view('supplement', ['products' => $products,'categories' => $categories]);
    }

  

    
    public function filter(Request $request)
    {
        // Retrieve filter parameters from the request
        $categoryId = $request->input('category_id');
        $name = $request->input('name');
        $price = $request->input('price');

        // Query builder for products
        $productsQuery = Product::query();

        // Filter by category if selected
        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        // Filter by name if provided
        if ($name) {
            $productsQuery->where('name', 'like', '%' . $name . '%');
        }

        // Filter by price if provided
        if ($price) {
            $productsQuery->where('price', '<=', $price);
        }

        // Retrieve filtered products
        $products = $productsQuery->get();

        // Pass the filtered products to the view
        return view('filtered_products', ['products' => $products]);
    }
}
