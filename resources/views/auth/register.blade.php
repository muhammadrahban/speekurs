@extends('layouts.app')
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="text-center my-5">
        <h3 class="mb-3">Create a Speekur Account</h3>
        <h5>Your gateway to exploring and supporting independent creators. One account to access all communities for free or create your own.</h5>
    </div>
    <form class="row px-3 px-md-0" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('name') is-invalid @enderror">
            <label>{{ __('Name') }}</label>
            <input type="name" class="form-control border-0 p-0" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('email') is-invalid @enderror">
            <label>{{ __('E-mail') }}</label>
            <input type="email" class="form-control border-0 p-0" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('password') is-invalid @enderror">
            <label>{{ __('Password') }}</label>
            <input type="password" class="form-control border-0 p-0" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow">
            <label>{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control border-0 p-0" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="offset-md-3 col-md-6 py-2 text-center ">
            <label for="agreement"><input style="width:25px; height:25px; vertical-align:middle;" id="agreement" type="checkbox" required> <h6 class="align-middle d-inline-block">I agree to the <a href="#" class="text-primary"><strong>Terms of Service</strong></a></h6></label>
        </div>
        <div class="offset-md-3 col-md-6 mb-3 py-2 px-0">
            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('SIGN UP') }}</button>
        </div>
        <div class="offset-md-3 col-md-6 px-0">
            <div class="row p-0 m-0 align-items-center">
                <div class="col-md-6 py-2">
                    <h5>Or Sign Up with</h5>
                </div>
                <div class="col-md-6 py-2 px-0">
                    <button type="button" class="btn btn-outline-primary rounded btn-lg btn-block py-3"><i class="fab fa-google"></i> Google</button>
                </div>
            </div>
        </div>
        <div class="offset-md-3 col-md-6 py-2 text-center">
            <h6>Already have an account? <a href="{{ route('login') }}" class="text-primary"><strong>Sign In</strong></a></h6>
        </div>
    </form>
</div>
@endsection
