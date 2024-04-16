<?php 

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    public function all()
    {
        return Brand::all();
    }

    public function find($id)
    {
        return Brand::findOrFail($id);
    }

    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function update($id, array $data)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return $brand;
    }

    public function destroy($id)
    {
        $brand = $this->find($id);
        $brand->delete();
    }

    // Other methods can be implemented here as needed
}
