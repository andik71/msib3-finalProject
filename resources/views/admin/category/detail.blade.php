@extends('admin.index')
@section('content')

<div class="pagetitle">
<h1>Category Details</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/product') }}">List Category</a></li>
    <li class="breadcrumb-item active">Category Detailst</li>
    </ol>
</nav>
</div><!-- End Page Title -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
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
            <a class="nav-link btn" href="{{ url('admin/category-edit',$category->id)}}">Edit Category</a>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Category Details</h5>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <img src="{{ url('/public/admin/img')}}/{{ $category->photo}}" alt="Profile" class="img-thumbnail">
                </div>
            </div>    

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Category Name</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $category->name }}</div>
            </div>


            </div>


        </div><!-- End Bordered Tabs -->

        </div>
    </div>

    </div>
</div>
</section>

@endsection