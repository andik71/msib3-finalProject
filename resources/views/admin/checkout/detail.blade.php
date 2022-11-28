@extends('admin.index')
@section('content')
@include('sweetalert::alert')
<div class="pagetitle">
<h1>Transaction Details</h1>
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/transaction') }}">Transaction</a></li>
    <li class="breadcrumb-item active">Transaction Details</li>
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
            <a class="nav-link btn" href="{{ url('admin/transaction-edit',$checkout->id)}}">Edit Transaction</a>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Transaction Details</h5>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Transaction ID</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $checkout->code }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label ">Billed To</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $checkout->users_id}}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Total Price</div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $checkout->total_price }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Status </div>
                <div class="col-lg-9 col-md-8 fw-bold">{{ $checkout->status}}</div>
            </div>


            </div>

            <a class="btn btn-primary btn-md mt-2" href="{{ url('admin/transaction') }}"><i class="bi bi-arrow-left"></i> Back</a>

        </div><!-- End Bordered Tabs -->

        </div>
    </div>

    </div>
</div>
</section>

@endsection