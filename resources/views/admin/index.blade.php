
<!-- ======= Header ======= -->
@include('admin.layout.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('admin.layout.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">


<!-- ======= Sweet Alert Package ======= -->
@include('sweetalert::alert')

@yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.layout.footer')
<!-- End Footer -->

