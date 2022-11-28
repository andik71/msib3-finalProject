@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Orders</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ url('admin/orders') }}">Orders</a></li>
        <li class="breadcrumb-item active">Add Orders</li>
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
                <h5 class="card-title">Add Orders Form</h5>

                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('orders.store') }}" enctype = "multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Order ID</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-upc"></i></span>
                                <select class="form-select" name="checkout_id" id="">
                                    <option>--Select Order ID--</option>
                                    @foreach ($checkout as $cek)
                                        <option value="{{ $cek->id }}"> {{ $cek->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Product Purchased</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-bag-fill"></i></span>
                                    <select class="form-select" name="products_id" id="">
                                    <option>--Select Products--</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"> {{ $product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Total Orders</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-calculator-fill"></i></span>
                                <input type="text" name="order_quantity" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" name="total_price" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/orders') }}" type="reset" class="btn btn-secondary">Reset</a>
                    </div>
                </form><!-- End Horizontal Form -->

                </div>
            </div>
    
            </div>
        </div>
    </div>
</section>

@endsection