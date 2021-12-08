@extends('layouts.app')
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="text-center my-5">
        <h3 class="mb-3">Confirm Password</h3>
        <h5>Please confirm your password before continuing.</h5>
    </div>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('password') is-invalid @enderror">
            <label>{{ __('Password') }}</label>
            <input type="password" class="form-control border-0 p-0" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 mb-3 py-2 px-0">
            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('CONFIRM PASSWORD') }}</button>
        </div>
        <div class="offset-md-3 col-md-6 py-2 text-center ">
            @if (Route::has('password.request'))
                <a class="text-primary" href="{{ route('password.request') }}">
                    <strong>{{ __('Forgot Your Password?') }}</strong>
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
