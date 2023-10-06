<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Ecommerace</title>
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
        <div class="auth-page-content align-middle">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12 mt-5">
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
                            <p class="mt-3 fs-15 fw-medium"></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> {{Session::get('success')}} </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong> {{Session::get('error')}} </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="p-2 mt-4">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger"><small>{{ $message }}</small></span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input" value="{{ old('password') }}">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
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
    <script src="{{ url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.j') }}s"></script>
    <script src="{{ url('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('admin/assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ url('admin/assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ url('admin/assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ url('admin/assets/js/pages/password-addon.init.js') }}"></script>
</body>

</html>