<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('meta')
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('')}}aqua/images/logo.png">

        <!-- preloader css -->
        {{-- <link rel="stylesheet" href="{{asset('')}}aqua/css/preloader.min.css" type="text/css" /> --}}

        <!-- Bootstrap Css -->
        <link href="{{asset('')}}aqua/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('')}}aqua/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('')}}aqua/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        <!-- DataTables -->
        <link href="{{asset('')}}aqua/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
            rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}aqua/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- datepicker css -->
        <link rel="stylesheet" href="{{asset('')}}aqua/libs/flatpickr/flatpickr.min.css">

        <!-- Responsive datatable examples -->
        <link href="{{asset('')}}aqua/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- select2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">

        <!-- select2-bootstrap4-theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">

        <!-- Sweet Alert-->
        <link href="{{asset('')}}aqua/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Css -->
        <link href="{{asset('')}}aqua/css/custom.css" rel="stylesheet" type="text/css" />

        <style>
            .badge-lg {
                font-size: 1em;
            }

            .background-light
            {
                background-image: url("{{ asset('aqua/images/background.png') }}");
                background-repeat: repeat;
                background-position: center;
            }

            @font-face {
                font-family: 'Magnolia-Script';
                src:url('{{ asset("aqua/fonts/magnolia-script") }}/Magnolia-Script.ttf.woff') format('woff'),
                    url('{{ asset("aqua/fonts/magnolia-script") }}/Magnolia-Script.ttf.svg#Magnolia-Script') format('svg'),
                    url('{{ asset("aqua/fonts/magnolia-script") }}/Magnolia-Script.ttf.eot'),
                    url('{{ asset("aqua/fonts/magnolia-script") }}/Magnolia-Script.ttf.eot?#iefix') format('embedded-opentype');
                font-weight: normal;
                font-style: normal;
            }

            .font-magnolia{
                font-family: 'Magnolia-Script';
            }

            @font-face {
                font-family: "Digital7";
                src: url("{{ asset('aqua/fonts/digital-7.ttf') }}") format("truetype");
            }

            @keyframes ldio-8rmkmd2b46v {
                0% { transform: rotate(0deg) }
                100% { transform: rotate(360deg) }
            }
            .ldio-8rmkmd2b46v > div > div {
                transform-origin: 100px 100px;
                animation: ldio-8rmkmd2b46v 3.0303030303030303s linear infinite;
                opacity: 0.8
            }
            .ldio-8rmkmd2b46v > div > div > div {
                position: absolute;
                left: 30px;
                top: 30px;
                width: 70px;
                height: 70px;
                border-radius: 70px 0 0 0;
                transform-origin: 100px 100px
            }.ldio-8rmkmd2b46v > div div:nth-child(1) {
                animation-duration: 0.7575757575757576s
            }
            .ldio-8rmkmd2b46v > div div:nth-child(1) > div {
                background: #93dbe9;
                transform: rotate(0deg);
            }.ldio-8rmkmd2b46v > div div:nth-child(2) {
                animation-duration: 1.0101010101010102s
            }
            .ldio-8rmkmd2b46v > div div:nth-child(2) > div {
                background: #689cc5;
                transform: rotate(0deg);
            }.ldio-8rmkmd2b46v > div div:nth-child(3) {
                animation-duration: 1.5151515151515151s
            }
            .ldio-8rmkmd2b46v > div div:nth-child(3) > div {
                background: #5e6fa3;
                transform: rotate(0deg);
            }.ldio-8rmkmd2b46v > div div:nth-child(4) {
                animation-duration: 3.0303030303030303s
            }
            .ldio-8rmkmd2b46v > div div:nth-child(4) > div {
                background: #3b4368;
                transform: rotate(0deg);
            }
            .loadingio-spinner-wedges-ape3omw0bl6 {
                width: 200px;
                height: 200px;
                display: inline-block;
                overflow: hidden;
                background: none;
            }
            .ldio-8rmkmd2b46v {
                width: 100%;
                height: 100%;
                position: relative;
                transform: translateZ(0) scale(1);
                backface-visibility: hidden;
                transform-origin: 0 0; /* see note above */
            }
            .ldio-8rmkmd2b46v div { box-sizing: content-box; }
            /* generated by https://loading.io/ */
        </style>

    </head>

    <body id="bodyTemplate" class="{{ Auth::user()->theme == 'light' ? 'background-light' : ''}}" data-sidebar="dark" data-layout-mode="{{ Auth::user()->theme }}" data-topbar="{{ Auth::user()->theme }}">

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ url('') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('')}}aqua/images/logo.png" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('')}}aqua/images/logo.png" alt="" height="24"> <span class="logo-txt">HAJI ATOK</span>
                                </span>
                            </a>

                            <a href="{{ url('') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('')}}aqua/images/logo.png" alt=""
                                        height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('')}}aqua/images/logo.png" alt=""
                                        height="24"> <span class="logo-txt">HAJI ATOK</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3
                            font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <button id="btnDatabase" class="my-3 btn btn-danger waves-effect btn-label waves-light"><i class="fa fa-database label-icon"></i>&nbsp;&nbsp;&nbsp;{{ Session::get('tahun') }}&nbsp;&nbsp;&nbsp;</button>

                        <form class="app-search d-none d-lg-block ps-4" method="get" action="{{ route('arsip.search') }}">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Pencarian..." name="keyword" required>
                                <button class="btn btn-info" type="submit"><i class="bx bx-search-alt align-middle"></i></button>
                            </div>
                        </form>

                    </div>

                    <div class="d-flex">

                        <div class="d-flex align-items-center">
                            <div class="d-none d-sm-block">
                                <h1 class="mb-0 pe-4" style="font-family: Digital7" id="realtimeClock"></h1>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item"
                                id="mode-setting">
                                <i data-feather="moon" class="icon-lg
                                    layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg
                                    layout-mode-light"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item
                                bg-soft-light border-start border-end"
                                id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="rounded-circle header-profile-user"
                                    src="{{asset('')}}aqua/images/logo.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1
                                    fw-medium">{{ Auth::user()->nama_pegawai }}</span>
                                <i class="mdi mdi-chevron-down d-none
                                    d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" href="javascript:;" onclick="ubahPassword()"><i class="mdi
                                        mdi-lock font-size-16 align-middle
                                        me-1"></i> Ubah Password</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:;"  onclick="document.getElementById('formLogout').submit()"><i class="mdi
                                        mdi-logout font-size-16 align-middle
                                        me-1" style="color: tomato"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li @if(request()->is('dashboard*')) class="mm-active" @endif>
                                <a href="{{ route('dashboard.index') }}">
                                    <i class="mdi mdi-view-dashboard text-secondary"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-title" data-key="t-menu">Arsip</li>
                            @foreach (DB::table('tipe_arsip')->orderBy('ordering')->orderBy('nama_tipe_arsip')->get() as $key => $item)
                                <li @if (request()->is('arsip/{{ $item->uri }}'))
                                    class="mm-active"
                                @endif><a href="{{ route('arsip.show',$item->uri) }}">
                                    @php
                                        if ($key == 0) {
                                            $textT = 'text-primary';
                                            $iconT = 'mdi-archive-arrow-up';
                                        }else if ($key == 1) {
                                            $textT = 'text-danger';
                                            $iconT = 'mdi-archive-arrow-down';
                                        }else if ($key == 2) {
                                            $textT = 'text-info';
                                            $iconT = 'mdi-archive-alert';
                                        }else if ($key == 3) {
                                            $textT = 'text-warning';
                                            $iconT = 'mdi-archive';
                                        }else if ($key == 4) {
                                            $textT = 'text-success';
                                            $iconT = 'mdi-file';
                                        }else if ($key == 5) {
                                            $textT = 'text-secondary';
                                            $iconT = 'mdi-file-cabinet';
                                        }else {
                                            $textT = 'text-white';
                                            $iconT = 'mdi-archive';
                                        }
                                    @endphp
                                    <i class="mdi {{ $iconT }} {{ $textT }}"></i>
                                    <span data-key="t-{{ $item->uri }}">{{ $item->nama_tipe_arsip }}</span>
                                </a></li>
                            @endforeach

                            {{-- <li @if (request()->is('arsip*'))
                               class="mm-active"
                            @endif>
                                <a href="javascript:;" class="has-arrow">
                                    <i class="mdi mdi-archive-arrow-up text-success"></i>
                                    <span data-key="t-permendagri">Arsip</span>
                                </a>
                                <ul class="sub-menu mm-collapse @if (request()->is('arsip*'))
                                    mm-show
                                @endif" aria-expanded="false" wfd-invisible="true">
                                    @foreach (DB::table('tipe_arsip')->orderBy('ordering')->orderBy('nama_tipe_arsip')->get() as $item)
                                        <li @if (request()->is('arsip/{{ $item->uri }}'))
                                            class="active"
                                        @endif><a href="{{ route('arsip.show',$item->uri) }}" data-key="t-86-2018">
                                            {{ $item->nama_tipe_arsip }}
                                        </a></li>
                                    @endforeach
                                </ul>
                            </li> --}}

                            <li class="menu-title mt-2" data-key="t-master">Master</li>
                            <li @if(request()->is('tipe-arsip*')) class="mm-active" @endif>
                                <a href="{{ route('tipe-arsip.index') }}">
                                    <i class="mdi mdi-archive-outline text-warning"></i>
                                    <span data-key="t-tipe-arsip">Tipe Arsip</span>
                                </a>
                            </li>
                            <li @if(request()->is('user*')) class="mm-active" @endif>
                                <a href="{{ route('user.index') }}">
                                    <i class="mdi mdi-account-box-multiple text-info"></i>
                                    <span data-key="t-manajemen-user">Manajemen User</span>
                                </a>
                            </li>
                            <hr>
                            <form id="formLogout" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                            <li>
                                <a href="javascript:;" onclick="document.getElementById('formLogout').submit()">
                                    <i class="mdi mdi-logout text-danger"></i>
                                    <span data-key="t-logout">Logout</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <!-- modal database ganti -->
            <div id="modalDatabase" class="modal fade" tabindex="-1"
                aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white"><i class="fa fa-calendar-check"></i> Ganti Tahun Database</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Database Haji Atok Saat Ini : {{ Session::get('tahun') }}</h5>
                            <hr>
                            <form action="{{ route('database.change') }}" method="post">
                                @csrf
                                <input type="hidden" name="current_url" value="{{ url()->current() }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="database_tahun">Tahun</label>
                                            <select class="form-control select2-database" name="database_tahun" id="database_tahun">
                                                @foreach (\DB::table('tahun')->get() as $item)
                                                    <option value="{{ $item->tahun }}" {{ Session::get('tahun') == $item->tahun ? 'selected' : '' }}>{{ $item->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn
                                btn-secondary waves-effect"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn
                                btn-danger waves-effect
                                waves-light">Ubah Tahun Database</button>
                        </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="main-content" id="miniaresult">
                @yield('content')
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script>
                            ©
                            Minia.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="#!"
                                    class="text-decoration-underline">Pengadilan Agama Kajen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark
                    p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle
                        ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-width"
                            id="layout-width-fuild" value="fuild"
                            onchange="document.body.setAttribute('data-layout-size',
                            'fluid')">
                        <label class="form-check-label"
                            for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-width"
                            id="layout-width-boxed" value="boxed"
                            onchange="document.body.setAttribute('data-layout-size',
                            'boxed')">
                        <label class="form-check-label"
                            for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-position"
                            id="layout-position-fixed" value="fixed"
                            onchange="document.body.setAttribute('data-layout-scrollable',
                            'false')">
                        <label class="form-check-label"
                            for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-position"
                            id="layout-position-scrollable" value="scrollable"
                            onchange="document.body.setAttribute('data-layout-scrollable',
                            'true')">
                        <label class="form-check-label"
                            for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="topbar-color"
                            id="topbar-color-light" value="light"
                            onchange="document.body.setAttribute('data-topbar',
                            'light')">
                        <label class="form-check-label"
                            for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="topbar-color"
                            id="topbar-color-dark" value="dark"
                            onchange="document.body.setAttribute('data-topbar',
                            'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-size"
                            id="sidebar-size-default" value="default"
                            onchange="document.body.setAttribute('data-sidebar-size',
                            'lg')">
                        <label class="form-check-label"
                            for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-size"
                            id="sidebar-size-compact" value="compact"
                            onchange="document.body.setAttribute('data-sidebar-size',
                            'md')">
                        <label class="form-check-label"
                            for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-size"
                            id="sidebar-size-small" value="small"
                            onchange="document.body.setAttribute('data-sidebar-size',
                            'sm')">
                        <label class="form-check-label"
                            for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-color"
                            id="sidebar-color-light" value="light"
                            onchange="document.body.setAttribute('data-sidebar',
                            'light')">
                        <label class="form-check-label"
                            for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-color"
                            id="sidebar-color-dark" value="dark"
                            onchange="document.body.setAttribute('data-sidebar',
                            'dark')">
                        <label class="form-check-label"
                            for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio"
                            name="sidebar-color"
                            id="sidebar-color-brand" value="brand"
                            onchange="document.body.setAttribute('data-sidebar',
                            'brand')">
                        <label class="form-check-label"
                            for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label"
                            for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                            name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label"
                            for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('')}}aqua/libs/jquery/jquery.min.js"></script>

        <script src="{{asset('')}}aqua/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('')}}aqua/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{asset('')}}aqua/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset('')}}aqua/libs/node-waves/waves.min.js"></script>
        <script src="{{asset('')}}aqua/libs/feather-icons/feather.min.js"></script>
        <script src="https://cdn.socket.io/4.2.0/socket.io.min.js"></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

        <!-- pace js -->
        <script src="{{asset('')}}aqua/libs/pace-js/pace.min.js"></script>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>


        <!-- datepicker js -->
        <script src="{{asset('')}}aqua/libs/flatpickr/flatpickr.min.js"></script>
        <script src="{{asset('')}}aqua/libs/flatpickr/id.js"></script>
        <script src="{{asset('')}}aqua/js/initial.min.js"></script>

        <!-- Required datatable js -->
        <script src="{{asset('')}}aqua/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('')}}aqua/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{asset('')}}aqua/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('')}}aqua/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
        <!-- select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" ></script>

        <script src="{{asset('')}}aqua/libs/notify/bootstrap-notify.min.js"></script>

        <!-- Sweet Alerts js -->
        <script src="{{asset('')}}aqua/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- apexcharts js -->
        <script src="{{asset('')}}aqua/libs/apexcharts/apexcharts.min.js"></script>

        {{-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script> --}}

        <script src="{{asset('')}}aqua/js/app.js"></script>
        @routes()

        {{-- <script src="{{asset('')}}aqua/js/ajax.js"></script> --}}

        <script>
            moment.locale('id');
            var timeDisplay = document.getElementById("realtimeClock");
            timeDisplay.innerHTML = moment().format('H:mm:ss');

            function refreshTime() {
                timeDisplay.innerHTML = moment().format('H:mm:ss')  ;
            }
            setInterval(refreshTime, 1000);

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout(timer);
                    timer = setTimeout(callback,ms);
                };
            })();

            $(function(){
                $("[data-toggle=tooltip").tooltip();
            })

            $('#btnDatabase').click(function(e){
                console.log('oke');
                $('#modalDatabase').modal('toggle');
            });


            $('.select2').select2({
                language: "id"
            });

            $('.select2-database').select2({
                language: "id",
                dropdownParent: $('#modalDatabase')
            });

            $('.select2-ubah').select2({
                language: "id",
                dropdownParent: $('#modalUbah')
            });

            $('.select2-tambah').select2({
                language: "id",
                dropdownParent: $('#formSimpan')
            });

            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            function notify(type, title, message, position = 'right', icon = 'fa fa-info' , animIn = 'animate__animated animate__fadeIn', animOut = 'animate__animated animate__fadeOut') {
                $.notify({
                    icon: icon,
                    title: title+'<br/>',
                    message: message,
                    url: ''
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: position
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    spacing: 10,
                    z_index: 999999,
                    delay: 2500,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: animIn,
                        exit: animOut
                    },
                    icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                });
            };

            var bodys = document.getElementsByTagName("body")[0];
            // right side-bar toggle
            $('.right-bar-toggle').on('click', function (e) {
                $('body').toggleClass('right-bar-enabled');
            });

            $('#mode-setting').on('click', function (e) {
                if(bodys.hasAttribute("data-layout-mode") && bodys.getAttribute("data-layout-mode") == "dark") {
                    document.body.setAttribute('data-layout-mode', 'light');
                    document.body.setAttribute('data-topbar', 'light');
                    document.body.setAttribute('data-sidebar', 'dark');
                    (bodys.hasAttribute("data-layout") && bodys.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'dark');
                    updateRadio('topbar-color-light');
                    updateRadio('sidebar-color-light');
                    saveTheme('light');
                } else {
                    document.body.setAttribute('data-layout-mode', 'dark');
                    document.body.setAttribute('data-topbar', 'dark');
                    document.body.setAttribute('data-sidebar', 'dark');
                    (bodys.hasAttribute("data-layout") && bodys.getAttribute("data-layout") == "horizontal") ? '' : document.body.setAttribute('data-sidebar', 'dark');
                    updateRadio('layout-mode-dark');
                    updateRadio('sidebar-color-dark');
                    saveTheme('dark');
                }
            });

            function updateRadio(radioId) {
                document.getElementById(radioId).checked = true;
            }

            function saveTheme(theme){
                axios.post(route('theme.change'),{
                    _token : '{{ csrf_token() }}',
                    theme : theme
                })
                .then(function (response) {
                    console.log(response);
                    notify('success','Berhasil!',response.data.message, 'center');
                    if (theme == 'light') {
                        $('#bodyTemplate').addClass('background-light');
                    }else{
                        $('#bodyTemplate').removeClass('background-light');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            function loadingData(status){
                if (status) {
                    $('#loadingNotif').html('<div class="loadingio-spinner-wedges-ape3omw0bl6"><div class="ldio-8rmkmd2b46v"><div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div></div></div><h6 class="mfont text-gray">Sedang Memuat...</h6>');
                    $('#loadingNotif').removeClass('d-none');
                    $('#loadingNotif').addClass('text-center');
                }else{
                    $('#loadingNotif').empty();
                    $('#loadingNotif').addClass('d-none');
                    $('#loadingNotif').removeClass('text-center');
                }
            }


        </script>

        @stack('script')

    </body>

</html>
