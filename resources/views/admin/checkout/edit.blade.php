@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Transaction</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/transaction') }}">Transaction</a></li>
                <li class="breadcrumb-item active">Edit Transaction</li>
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
                                <a class="nav-link btn" href="{{ route('transaction.show', $checkout->id) }}">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active btn" href="{{ url('admin/orders-edit', $checkout->id) }}">Edit
                                    Transaction</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form method="POST" action="{{ route('transaction.update',$checkout->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="ordersCode" class="col-md-4 col-lg-3 col-form-label">Transaction ID</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input class="form-control" type="text" name="code" value="{{ $checkout->code}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ordersCode" class="col-md-4 col-lg-3 col-form-label">Billed To</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="users_id">
                                                <option>-- Select Orders ID --</option>
                                                @foreach ($users as $user)
                                                    @php $sel = ($user->id == $user->id) ? 'selected' : ''; @endphp
                                                    <option value="{{ $user->id }}" {{ $sel }}>
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ordersName" class="col-md-4 col-lg-3 col-form-label">Status</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="status">
                                                <option>-- Select Status --</option>
                                                @php $sel = ($checkout->status == $checkout->status) ? 'selected' : ''; @endphp
                                                <option {{$sel}} value="{{ $checkout->status }}">{{$checkout->status}}</option>
                                                <option value="unpaid"">Unpaid</option>
                                                <option value="pending">Pending</option>
                                                <option value="paid">Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="stok" class="col-md-4 col-lg-3 col-form-label">Total Price</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="total_price" type="text" class="form-control" id="Country"
                                                value="{{ $checkout->total_price }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a type="reset" href="{{ url('admin/transaction') }}" class="btn btn-secondary">Reset</a>
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
