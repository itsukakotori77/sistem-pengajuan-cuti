<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="seo & digital marketing">
    <meta name="keywords" content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company">
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <title>Sistem Pengajuan Cuti Kepegawaian</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('asset/images/Logo.png') }}" type="image/png">
    @include('layoutsFront.linkcss')

    @section('css')

    @show

</head>


<body data-spy="scroll" data-target=".fixed-top">
    @include('layoutsFront.navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('layoutsFront.footer')

    <!-- Javascript -->
    @include('layoutsFront.linkjs')

    @section('js')

    @show

    <script>
        function logout()
        {
            $('#formLogout').submit();
        }
    </script>

  </body>
  </html>
   