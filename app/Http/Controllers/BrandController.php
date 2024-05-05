<?php

// App/Http/Controllers/BrandController.php

namespace App\Http\Controllers;


use App\Repositories\BrandRepositoryInterface;
use Illuminate\Http\Request;


class BrandController extends Controller
{ 
    protected $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only('name');

        $this->brandRepository->create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    }

    public function edit($id)
    {
        $brand = $this->brandRepository->find($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only('name');

        $this->brandRepository->update($id, $data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy($id)
    {
        $this->brandRepository->destroy($id);
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}

