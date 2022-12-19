@extends('admin.index')
@section('content')
@include('sweetalert::alert')
<div class="pagetitle">
<h1>Product Details</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/product') }}">Product</a></li>
    <li class="breadcrumb-item active">Product Details</li>
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
            <a class="nav-link btn" href="{{ url('admin/product-edit',$product->id)}}">Edit Product</a>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Product Details</h5>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <img src="{{ url('/public/admin/img')}}/{{ $product->photo}}" alt="Profile" class="img-thumbnail">
                </div>
            </div>    

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Product Name</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->name }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Description</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->desc }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Category</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->category->name }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Store</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->store->name }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Stok</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->stok }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Sold</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $product->sold }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Price</div>
                <div class="col-lg-9 col-md-8 fw-bold">Rp. {{ number_format($product->price) }}</div>
            </div>

            </div>

            <a class="btn btn-primary btn-md mt-2" href="{{ url('admin/product') }}"><i class="bi bi-arrow-left"></i> Back</a>

        </div><!-- End Bordered Tabs -->

        </div>
    </div>

    </div>
</div>
</section>

@endsection