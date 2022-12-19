@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/category') }}">Category</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
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
                                <a class="nav-link btn" href="{{ route('category.show', $category->id) }}">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active btn" href="{{ url('admin/category-edit', $category->id) }}">Edit
                                    Category</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="productImage" class="col-md-4 col-lg-3 col-form-label">Category
                                            Image</label>
                                        <div class="col-md-3 col-lg-4">
                                            @if (!empty($category->photo))
                                                <img src="{{ url('public/admin/img') }}/{{ $category->photo }}"
                                                    class="img-thumbnail">
                                                <br />{{ $category->photo }}
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
                                        <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Category Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" id="categoryName" type="text" class="form-control"
                                                value="{{ $category->name }}">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ url('admin/category') }}" type="reset" class="btn btn-secondary">Reset</a>
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
