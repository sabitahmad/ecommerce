<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Log Out | Ecommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('admin/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ url('admin/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ url('admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <!-- Dark Logo-->
                                <a href="{{ url('') }}" class="logo logo-dark">
                                    <img src="{{ url('admin/assets/images/logo-dark.png') }}" alt="" height="17">
                                </a>
                                <!-- Light Logo-->
                                <a href="{{ url('') }}" class="logo logo-light">
                                    <img src="{{ url('admin/assets/images/logo-light.png') }}" alt="" height="17">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4 text-center">
                                <lord-icon src="https://cdn.lordicon.com/hzomhqxz.json" trigger="loop" colors="primary:#8c68cd,secondary:#4788ffs" style="width:180px;height:180px"></lord-icon>

                                <div class="mt-4 pt-2">
                                    <h5>You are Logged Out</h5>
                                    <p class="text-muted">Thank you for using <span class="fw-semibold">velzon</span> admin template</p>
                                    <div class="mt-4">
                                        <a href="{{ route('login') }}" class="btn btn-primary w-100">Sign In</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    

    <!-- JAVASCRIPT -->
    <script src="{{ url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('admin/assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ url('admin/assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ url('admin/assets/js/pages/particles.app.js') }}"></script>
</body>

</html>