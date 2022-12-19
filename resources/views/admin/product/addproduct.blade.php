@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Product</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
        <li class="breadcrumb-item active"></a>Add Product</li>
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
                <h5 class="card-title">Add Product Form</h5>

                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('product.store') }}" enctype = "multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-bag-fill"></i></span>
                                <input type="text" name="name" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputDesc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-chat-square-text-fill"></i></span>
                                <textarea type="text" name="desc" rows="6" class="form-control" id="inputText"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" name="price" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-tag-fill"></i></span>
                                <select class="form-select" name="category_id" id="">
                                    <option>--Select Category--</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputStore" class="col-sm-2 col-form-label">Store</label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-shop"></i></span>
                                <select class="form-select" name="store_id" id="">
                                    <option>--Select Store--</option>
                                    @foreach ($store as $st)
                                        <option value="{{ $st->id }}"> {{ $st->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputStok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-bag-check-fill"></i></span>
                                <input type="text" name="stok" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputSold" class="col-sm-2 col-form-label">Sold</label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-bag-x-fill"></i></span>
                                <input type="text" name="sold" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputSold" class="col-sm-2 col-form-label">Photo </label>
                    <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-images"></i></span>
                                <input type="file" name="photo" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/product') }}" type="reset" class="btn btn-secondary">Reset</a>
                    </div>
                </form><!-- End Horizontal Form -->

                </div>
            </div>
    
            </div>
        </div>
    </div>
</section>

@endsection