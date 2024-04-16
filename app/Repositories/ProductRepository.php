<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;


class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        // $data = [
        //     'name' => 'Example Product',
        //     'price' => 100,
        //     'description' => 'Example description',
        //     'stock' => 10,
        //     'category_id' => 1, // Replace 1 with the actual ID of the category
        // ];
        return Product::create($data);
    }

    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = $this->find($id);
        $product->delete();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getAllWithBrand()
    {
        return Product::with('brand')->get();
    }
}
