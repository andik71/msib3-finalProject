@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Transaction</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ url('admin/checkout') }}">Transaction</a></li>
        <li class="breadcrumb-item active">Add Transaction</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li><strong> {{ $error }} </strong></li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
    
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Add Transaction Form</h5>

                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('transaction.store') }}" enctype = "multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Trancation Id</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-receipt"></i></span>
                                <select class="form-select" name="orders_id" id="">
                                    <option>--Select Trancation Id--</option>
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->id }}"> {{ $order->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Billed To</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-receipt"></i></span>
                                <select class="form-select" name="users_id" id="">
                                    <option>--Select Bill To--</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-calculator-fill"></i></span>
                                <input type="text" name="total_price" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                                <select class="form-select"  name="status" id="">
                                    <option selected>--Select Status--</option>
                                    <option value="unpaid">Unpaid</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/checkout') }}" type="reset" class="btn btn-secondary">Reset</a>
                    </div>
                </form><!-- End Horizontal Form -->

                </div>
            </div>
    
            </div>
        </div>
    </div>
</section>

@endsection