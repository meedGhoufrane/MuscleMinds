<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="../assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo2/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

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
                                <span class="input-group-text input-group-addon bg-transparent border-primary"
                                    data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                                <input type="text" class="form-control bg-transparent border-primary"
                                    placeholder="Select date" data-input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-12 stretch-card">
                            <div class="row flex-grow-1">
                                <div class="col-md-4 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-baseline">
                                                <h6 class="card-title mb-0"> users</h6>
                                                <div class="dropdown mb-2">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-md-12 col-xl-5">
                                                    <h3 class="mb-2">{{ $totalUsers }}  </h3>
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="text-success">
                                                            <span>+3.3%</span>
                                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12 col-xl-7">
                                                    <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-baseline">
                                                <h6 class="card-title mb-0">Orders</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-md-12 col-xl-5">
                                                    <h3 class="mb-2">{{ $totalOrders }}   </h3>
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="text-danger">
                                                            <span>-2.8%</span>
                                                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12 col-xl-7">
                                                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-baseline">
                                                <h6 class="card-title mb-0">Products</h6>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-md-12 col-xl-5">
                                                    <h3 class="mb-2">  {{ $totalProducts }} </h3>
                                                    <div class="d-flex align-items-baseline">
                                                        <p class="text-success">
                                                            <span>+2.8%</span>
                                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-12 col-xl-7">
                                                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->




                </div>

                <!-- partial:partials/_footer.html -->
                @include('admin.includes.footerdashboard')

                <!-- partial -->

        
    </div>
</body>

</html>
