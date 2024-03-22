<!DOCTYPE html>

<html lang="en">

@include('admin.includes.head')


<body>
    <div class="main-wrapper">

        @include('admin.includes.navbar')

        @include('admin.includes.aside')

        <!-- partial -->

        <!-- partial in side dashboard -->

        <div class="page-content">

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                                data-feather="calendar" class="text-primary"></i></span>
                        <input type="text" class="form-control bg-transparent border-primary"
                            placeholder="Select date" data-input>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="printer"></i>
                        Print
                    </button>
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                        Download Report
                    </button>
                </div>
            </div>
           
            <div class="row">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
                </div>
                <div class="col-12 col-xl-12 stretch-card">
                  

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if ($product->image && file_exists(public_path($product->image)))
                                            <img src="{{ asset($product->image) }}" alt="Product Image" style="max-width: 100px;">
                                        @else
                                            <span class="text-danger">Image Not Found</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category->name }}</td> <!-- Assuming you have a relationship with category -->
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div> <!-- row -->
        </div>

        <!-- partial:partials/_footer.html -->
        @include('admin.includes.footerdashboard')

        <!-- partial -->


    </div>
</body>

</html>
