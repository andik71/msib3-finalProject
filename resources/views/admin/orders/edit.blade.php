@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/orders') }}">Orders</a></li>
                <li class="breadcrumb-item active">Edit Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                                <a class="nav-link btn" href="{{ route('orders.show', $orders->id) }}">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active btn" href="{{ url('admin/orders-edit', $orders->id) }}">Edit
                                    orders</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form method="POST" action="{{ route('orders.update',$orders->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="ordersCode" class="col-md-4 col-lg-3 col-form-label">Billed ID</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="users_id">
                                                <option>-- Select Bill To --</option>
                                                @foreach ($users as $user)
                                                    @php $sel = ($orders->users_id == $user->id) ? 'selected' : ''; @endphp
                                                    <option value="{{ $user->id }}" {{ $sel }}>
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ordersName" class="col-md-4 col-lg-3 col-form-label">Product Purchased</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="products_id">
                                                <option>-- Select Products --</option>
                                                @foreach ($products as $product)
                                                    @php $sel = ($orders->products_id == $product->id) ? 'selected' : ''; @endphp
                                                    <option value="{{ $product->id }}" {{ $sel }}>
                                                        {{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="stok" class="col-md-4 col-lg-3 col-form-label">Total Orders</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="order_quantity" type="text" class="form-control" id="Country"
                                                value="{{ $orders->order_quantity }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sold" class="col-md-4 col-lg-3 col-form-label">Total Price</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="total_price" type="text" class="form-control" id="Address"
                                                value="{{ $orders->total_price }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a type="reset" href="{{ url('admin/orders') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
