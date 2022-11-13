

<!-- ======= Header ======= -->
@include('admin.layout.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('admin.layout.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">


{{-- @foreach ($products as $product)
    <p class="fw-bold"> {{ $product->name }} </p>
    <p class="fw-bold"> {{ $product->code }} </p>
    <p class="fw-bold"> Rp.{{ number_format( $product->price )}} </p>
    <p class="fw-bold"> {{ $product->stok }} </p>
    <p class="fw-bold"> {{ $product->sold }} </p>
    <p class="fw-bold"> {{ $product->category->name }} </p>
    <p class="fw-bold"> {{ $product->store->name }} </p>
    <p class="fw-bold"> {{ $product->store->location }} </p>
    <p class="fw-bold"> {{ $product->store->rating }} </p>
@endforeach --}}

@yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('admin.layout.footer')
<!-- End Footer -->

