@extends('admin.index')
@section('content')
@include('sweetalert::alert')
<div class="pagetitle">
<h1>Orders Details</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/orders') }}">Orders</a></li>
    <li class="breadcrumb-item active">Orders Details</li>
    </ol>
</nav>
</div><!-- End Page Title -->

<section class="section profile">
<div class="row">

    <div class="col-xl-12">

    <div class="card">
        <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>
        
            <li class="nav-item">
            <a class="nav-link btn" href="{{ url('admin/orders-edit',$orders->id)}}">Edit Orders</a>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Orders Details</h5>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <img src="{{ url('/public/admin/img')}}/{{ $orders->photo}}" alt="Profile" class="img-thumbnail">
                </div>
            </div>    

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Billed To</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $orders->name}}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Product Purchased</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $orders->product }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Total Order</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $orders->order_quantity }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Total Price</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $orders->total_price}}</div>
            </div>


            </div>

            <a class="btn btn-primary btn-md mt-2" href="{{ url('admin/orders') }}"><i class="bi bi-arrow-left"></i> Back</a>

        </div><!-- End Bordered Tabs -->

        </div>
    </div>

    </div>
</div>
</section>

@endsection