@extends('layouts.app')
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="text-center my-5">
        <h3 class="mb-3">Forgot password?</h3>
        <h5>Enter your email address below and we'll get you back on track.</h5>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="row px-3 px-md-0" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="offset-md-3 col-md-6 bg-white mb-3 py-2 rounded shadow @error('email') is-invalid @enderror">
            <label>{{ __('E-mail') }}</label>
            <input type="email" class="form-control border-0 p-0" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="offset-md-3 col-md-6 mb-3 py-2 px-0">
            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('SEND RESET LINK') }}</button>
        </div>
        <div class="offset-md-3 col-md-6 py-2 text-center">
            <h6>Back to the <a href="{{ route('login') }}" class="text-primary"><strong>Sign In</strong></a></h6>
        </div>
    </form>
</div>

@endsection
