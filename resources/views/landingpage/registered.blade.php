@extends('landingpage.index')
@section('content')


<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="display-3 fw-bold mb-2">Thankyou for Register!</h1>
            <h5 class="fw-normal mt-3 mb-5">
                Please Wait for Approval From Our Admin and Please Login Again.
            </h5>

            <a class="btn btn-success" href="{{ url('/login') }}">Login Again</a>
        </div>
    </div>
</section>
<!-- End Section -->



@endsection


