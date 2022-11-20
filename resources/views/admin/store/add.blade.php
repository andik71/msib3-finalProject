@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>List Store</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ url('admin/store') }}">Store</a></li>
        <li class="breadcrumb-item active">Add Store</li>
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
                <h5 class="card-title">Add Store Form</h5>

                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('store.store') }}" enctype = "multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Store Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-shop"></i></span>
                                <input type="text" name="name" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" name="location" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text" ><i class="bi bi-star-fill"></i></span>
                                <input type="text" name="rating" class="form-control" id="inputText">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/store') }}" type="reset" class="btn btn-secondary">Reset</a>
                    </div>
                </form><!-- End Horizontal Form -->

                </div>
            </div>
    
            </div>
        </div>
    </div>
</section>

@endsection