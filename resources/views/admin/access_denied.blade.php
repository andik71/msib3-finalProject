@extends('admin.index')
@section('content')
    <div class="jumbotron mb-5">
    <h1 class="display-4">Access Denied</h1>
    <p class="lead">You Don't Have Permission to Access This Page!</p>
    <hr class="my-4">
    <p>Ask admin to give permisson and role for access this page.</p>
    <a class="btn btn-primary btn-md" href="{{ url('/admin') }}" >Home</a>
</div>
@endsection