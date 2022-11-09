<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Dashboard - Admin</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="{{ url('admin/img/favicon.png') }}" rel="icon">
<link href="{{ url('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/quill/quill.snow.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/quill/quill.bubble.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/remixicon/remixicon.css') }} " rel="stylesheet">
<link href="{{ asset('admin/vendor/simple-datatables/style.css') }} " rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('admin/css/style.css') }} " rel="stylesheet">

<!-- =======================================================
* Template Name: NiceAdmin - v2.4.1
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
@include('admin.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('admin.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        @yield('content')

    </div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.footer')
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }} "></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('admin/vendor/chart.js/chart.min.js') }} "></script>
<script src="{{ asset('admin/vendor/echarts/echarts.min.js') }} "></script>
<script src="{{ asset('admin/vendor/quill/quill.min.js') }} "></script>
<script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }} "></script>
<script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }} "></script>
<script src="{{ asset('admin/vendor/php-email-form/validate.js') }} "></script>

<!-- Template Main JS File -->
<script src="{{ asset('admin/js/main.js') }} "></script>

</body>

</html>