<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;

use App\Models\Product;
use App\Models\Brand;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllWithBrand(); // Assuming you have a method to get all products with the brand relationship
        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }


    public function countAddToCart()
    {
        return Cart::where('product_id', $this->id)->count();
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all(); // Fetch all brands
        return view('admin.products.create', compact('categories', 'brands'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id', // Add validation for brand_id
            'image' => 'nullable|image|max:4096', 
        ]);
    
        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Store the image and get its path
            $imagePath = $request->file('image')->store('products', 'public');
    
            // Add the image path to the validated data
            $validatedData['image'] = $imagePath;
        }
    
        $this->productRepository->create($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    
    public function edit($id)
{
    $product = $this->productRepository->find($id);
    $categories = $this->productRepository->getCategories();
    $brands = Brand::all(); // Fetch all brands
    return view('admin.products.edit', compact('product', 'categories', 'brands'));
}


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id', 
            'image' => 'nullable|image|max:4096', 
        ]);
    
        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Store the image and get its path
            $imagePath = $request->file('image')->store('products', 'public');
    
            // Add the image path to the validated data
            $validatedData['image'] = $imagePath;
        }
    
        $this->productRepository->update($id, $validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
