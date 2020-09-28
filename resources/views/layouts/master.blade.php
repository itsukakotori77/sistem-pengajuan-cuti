<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <title>Sistem Pengajuan Cuti Kepegawaian</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('asset/images/Logo.png') }}" type="image/png">
    <style>
        .font-proxima{
        color: #FFFF;
        font-family: 'Proxima Nova Alt';
        }
    </style>

    <!-- Css -->
    @include('layouts.linkcss')

    @section('css')

    @show
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.sidebar')
    </section>

    <section class="content">
        <!-- Content -->
        @yield('content')
        
    </section>

    <!-- Link JS -->
    @include('layouts.linkjs')
    <script>
        function logout()
        {
            $('#formLogout').submit();
        }
    </script>

    @section('js')

    @show
</body>

</html>
