
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Halaman Saji Arsip Terpadu Online Kepanitraan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Halaman Saji Arsip Terpadu Online Kepanitraan" name="description" />
        <meta content="Akim Vaurozi" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('aqua')}}/images/logo.png">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{asset('aqua')}}/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('aqua')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('aqua')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('aqua')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="{{asset('aqua')}}/images/logo.png" alt="" height="28"> <span class="logo-txt">HAJI ATOK</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Selamat Datang!</h5>
                                            <p class="text-muted mt-2">Silahkan Masuk Terlebih Dahulu</p>
                                        </div>
                                        <form class="custom-form mt-4 pt-2" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" tabindex="1">
                                                @error('username')
                                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>
                                                </div>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon" name="password" id="password" tabindex="2">
                                                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                @error('password')
                                                <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                @enderror
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="remember" name="remember" tabindex="3">
                                                        <label class="form-check-label" for="remember-check">
                                                            Ingat saya
                                                        </label>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>    . HAJI ATOK <i class="mdi mdi-heart text-danger"></i> Halaman Saji Arsip Terpadu Online Kepanitraan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-secondary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-7">
                                    <div class="p-0 p-sm-4 px-xl-0">
                                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <!-- end carouselIndicators -->
                                            <div class="carousel-inner">

                                            </div>
                                            <!-- end carousel-inner -->
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{asset('aqua')}}/libs/jquery/jquery.min.js"></script>
        <script src="{{asset('aqua')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('aqua')}}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{asset('aqua')}}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset('aqua')}}/libs/node-waves/waves.min.js"></script>
        <script src="{{asset('aqua')}}/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="{{asset('aqua')}}/libs/pace-js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="{{asset('aqua')}}/js/pages/pass-addon.init.js"></script>

    </body>

</html>
