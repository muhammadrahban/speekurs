@extends('layouts.app')
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="text-center my-5">
        <h3 class="mb-3">Sign In</h3>
    </div>
    @if (session('error'))
        <p class="alert alert-danger">{{session('error')}}</p>
    @endif
    <form class="row px-3 px-md-0" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('email') is-invalid @enderror">
            <label>{{ __('E-mail') }}</label>
            <input type="email" class="form-control border-0 p-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('password') is-invalid @enderror">
            <label>{{ __('Password') }}</label>
            <input type="password" class="form-control border-0 p-0" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 py-2 text-center ">
            @if (Route::has('password.request'))
                <a class="text-primary" href="{{ route('password.request') }}">
                    <strong>{{ __('Forgot Your Password?') }}</strong>
                </a>
            @endif
        </div>
        <div class="offset-md-3 col-md-6 mb-3 py-2 px-0">
            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('SIGN IN') }}</button>
        </div>
        <div class="offset-md-3 col-md-6 px-0">
            <div class="row p-0 m-0 align-items-center">
                <div class="col-md-6 py-2">
                    <h5>Or Sign In with</h5>
                </div>
                <div class="col-md-6 py-2 px-0">
                    <a href="{{ url('/login/google') }}">
                        <button type="button" class="btn btn-outline-primary rounded btn-lg btn-block py-3"><i class="fab fa-google"></i> Google</button>
                    </a>
                </div>
            </div>
        </div>
        @if (Route::has('register'))
        <div class="offset-md-3 col-md-6 py-2 text-center">
            <h6>Don’t have an account yet? <a href="{{ route('register') }}" class="text-primary"><strong>Sign Up</strong></a></h6>
        </div>
        @endif
    </form>
</div>
@endsection
