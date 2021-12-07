<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ config('app.name') }} - @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('material-dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material-dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material-dashboard/css/material-dashboard.css?v=3.0.0') }}"
        rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.admin-sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl bg-gradient-secondary shadow-dark my-4"
            id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0 fs-4 text-white">@yield('page-name')</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2" id="app">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible text-white text-sm" role="alert">
                    <span class="text-md font-weight-bold pe-4">Error. </span> 
                    {{ $error }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach

            @isset ($success)
                <div class="alert alert-info alert-dismissible text-white text-sm" role="alert">
                    <span class="text-md font-weight-bold pe-4">Success. </span> 
                    {{ $success }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endisset

            @yield('content')
            @include('layouts.admin-footer')
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-dashboard/js/plugins/chartjs.min.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material-dashboard/js/material-dashboard.min.js') }}?v=3.0.0"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    @include('layouts.analytics')
</body>

</html>
