@extends('layouts.app')

@section('content')
<!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="javascript:void(0)" class="">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ __('EMP-MNG') }}</h3>
                    </a>
                    <h3>Sign In</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-floating mb-3">
                        <input type="email" id="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="password">{{ __('Password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Check me out') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a> -->
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">{{ __('Sign In') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->
@endsection
