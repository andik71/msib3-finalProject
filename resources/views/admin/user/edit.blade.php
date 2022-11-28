@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/user') }}">User</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                                <a class="nav-link btn" href="{{ route('user.show', $user->id) }}">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active btn" href="{{ url('admin/user-edit', $user->id) }}">Edit
                                    User</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" id="categoryName" type="text" class="form-control"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" id="categoryName" type="text" class="form-control"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" name="role">
                                                <option>-- Select Role --</option>
                                                    @php 
                                                    $sel = ($user->role == $user->role) ? 'selected' : ''; 
                                                    @endphp
                                                    <option value="{{ $user->role }}" {{ $sel }}>{{ $user->role }}</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="categoryName" class="col-md-4 col-lg-3 col-form-label">Activated</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check mt-2">
                                            @php 
                                                $cek = ( $user->isactive == 1) ? 'checked' : '';
                                    
                                                if($user->isactive == 1){
                                                    $val= "0";
                                                }else{
                                                    $val="1";
                                                }
                                            @endphp

                                                <input class="form-check-input" name="isactive" type="checkbox" value="{{$val}}" {{$cek}}>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    @if ($user->isactive == 1)
                                                        {{"Unactivated User"}}
                                                    @else
                                                        {{"Activated User"}}
                                                    @endif
                                                </label>
                                            </div>
                                            </div>
                                        </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ url('admin/user') }}" type="reset" class="btn btn-secondary">Reset</a>
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
