@extends('layouts.app')
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="text-center my-5">
        <h3 class="mb-3">Let's update your password!</h3>
        <h5>Set a new password for your account</h5>
    </div>
    <form class="row px-3 px-md-0" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('email') is-invalid @enderror">
            <label>{{ __('E-mail') }}</label>
            <input type="email" class="form-control border-0 p-0" name="email" value="{{ $email ?? old('email') }}" required readonly>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('password') is-invalid @enderror">
            <label>{{ __('Password') }}</label>
            <input type="password" class="form-control border-0 p-0" name="password" required autocomplete="new-password" autofocus>
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
        <div class="offset-md-3 col-md-6 mb-3 py-2 px-0">
            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('RESET PASSWORD') }}</button>
        </div>
    </form>
</div>
@endsection
