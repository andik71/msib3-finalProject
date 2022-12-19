@extends('layouts.app')

@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="{{ url('/') }}" style="text-decoration:none ;" class="logo d-flex align-items-center w-auto">
                            <img src=" {{ url('/public/admin/img/logo5.png')}} " alt="">
                            <span class="d-none d-lg-block">Computerpedia</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <form method="POST" action="{{ route('register') }}" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label for="name" class="form-label">{{ __('Name') }} </label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourAddress" class="form-label">{{ __('Address') }}</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourPhone" class="form-label">{{ __('Phone Number') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" onclick="myFunction()">
                                        <label class="form-check-label" for="password">{{ __('Show Password') }}</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>
                                </div>
                                <div class="col-12">
                                    @guest
                                    @if (Route::has('register'))
                                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                                    @endif
                                    @else
                                    @endguest
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<script>
function myFunction() {
    var x = document.getElementById("password");
    var y = document.getElementById("password-confirm");

    if (x.type === "password" && y.type === "password" ) {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
</script>
@endsection
