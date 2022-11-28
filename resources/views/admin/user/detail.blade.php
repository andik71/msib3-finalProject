@extends('admin.index')
@section('content')

<div class="pagetitle">
<h1>User Details</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/user') }}">User</a></li>
    <li class="breadcrumb-item active">User Details</li>
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
            <a class="nav-link btn" href="{{ url('admin/user-edit',$user->id)}}">Edit User</a>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">User Details</h5>


            <div class="row">
                <div class="col-lg-3 col-md-4 label ">User Name</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $user->name }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $user->email }}</div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Role</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $user->role }}</div>
            </div>


            </div>

            <a class="btn btn-primary btn-md mt-2" href="{{ url('admin/user') }}"><i class="bi bi-arrow-left"></i> Back</a>

        </div><!-- End Bordered Tabs -->

        </div>
    </div>

    </div>
</div>
</section>

@endsection