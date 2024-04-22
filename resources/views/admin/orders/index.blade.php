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
               
                <div class="col-12 col-xl-12 stretch-card">
                  

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name user</th>
                                <th>sabtotal</th>
                                <th>status order</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->sub_total }}</td>
                                    <td>{{ $item->order_status }}</td>
                        
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
