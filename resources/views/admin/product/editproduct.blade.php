@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/product') }}">Product</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
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
                                <a class="nav-link btn" href="{{ route('product.show', $product->id) }}">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active btn" href="{{ url('admin/product-edit', $product->id) }}">Edit
                                    Product</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="productImage" class="col-md-4 col-lg-3 col-form-label">Product
                                            Image</label>
                                        <div class="col-md-3 col-lg-4">
                                            @if (!empty($product->photo))
                                                <img src="{{ url('public/admin/img') }}/{{ $product->photo }}"
                                                    class="img-thumbnail">
                                                <br />{{ $product->photo }}
                                            @endif
                                            <div class="pt-2">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-upload"></i></span>
                                                    <input type="file" name="photo" class="form-control"
                                                        id="inputText">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="productCode" class="col-md-4 col-lg-3 col-form-label">Product Code</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="code" id="productCode" type="text" class="form-control"
                                                value="{{ $product->code }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="productName" class="col-md-4 col-lg-3 col-form-label">Product Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" id="productName" type="text" class="form-control"
                                                value="{{ $product->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="desc" class="col-md-4 col-lg-3 col-form-label">Description</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea type="text" name="desc" class="form-control" id="desc" style="height: 160px">{{ $product->desc }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="category" class="col-md-4 col-lg-3 col-form-label">Category</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="category_id">
                                                <option>-- Select Category --</option>
                                                @foreach ($categories as $category)
                                                    @php $sel = ($category->id == $category->id) ? 'selected' : ''; @endphp
                                                    <option value="{{ $category->id }}" {{ $sel }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="store" class="col-md-4 col-lg-3 col-form-label">Store</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="store_id">
                                                <option>-- Select Store --</option>
                                                @foreach ($stores as $store)
                                                    @php $sel = ($store->id == $store->id) ? 'selected' : ''; @endphp
                                                    <option value="{{ $store->id }}" {{ $sel }}>
                                                        {{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="stok" class="col-md-4 col-lg-3 col-form-label">Stok</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="stok" type="text" class="form-control" id="Country"
                                                value="{{ $product->stok }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sold" class="col-md-4 col-lg-3 col-form-label">Sold</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="sold" type="text" class="form-control" id="Address"
                                                value="{{ $product->sold }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-md-4 col-lg-3 col-form-label">Price</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="price" type="text" class="form-control" id="price"
                                                value="{{ ($product->price) }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a type="reset" href="{{ url('admin/product') }}" class="btn btn-secondary">Reset</a>
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
