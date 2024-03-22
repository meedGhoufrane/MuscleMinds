<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $products = $this->productRepository->getAll();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Ensure the category ID exists in the categories table
            'image' => 'nullable|image|max:4096', // Validate the image file
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
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products');
        }

        $this->productRepository->update($id, $data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
