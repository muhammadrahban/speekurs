@extends('layouts.app')
@section('title' )
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="p-0">
        <h3 class="text-center mt-5">Account Settings</h3>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-dunger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('setaccount') }}">
                @csrf
                <div class="row m-0 align-items-center ">
                    <div class="col-12 mb-4 text-center">
                        <img height="70" src="{{URL('/')}}/image/{{Auth::user()->image}}">
                    </div>
                    <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('name') is-invalid @enderror">
                        <label>{{ __('Email') }}</label>
                        <input type="email" class="form-control border-0 p-0" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <div class="col-md-6 mb-3 px-0 pr-md-3">
                        <div class="px-3 py-2 bg-white rounded shadow @error('password') is-invalid @enderror">
                            <label>{{ __('Password') }}</label>
                            <input type="password" class="form-control border-0 p-0" name="password">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 px-0 pl-md-3">
                        <div class="px-3 py-2 bg-white rounded shadow @error('password_confirmation') is-invalid @enderror">
                            <label>{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control border-0 p-0" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <hr>
                        <small>Enter current password to confirm changes</small>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control mb-3" placeholder="Current Password" name="current_password" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block mb-3">
                            {{ __('Save Account') }}
                        </button>
                    </div>
                </div>
            </form>
            <form class="row shadow rounded bg-white" method="POST" action="{{ route('deactive') }}">
                @csrf
                    <div class="col-md-6">
                        <div class="">
                            <p class="m-0 ml-0 mr-auto">Deactivate your account</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <input type="password" class="form-control mb-3" placeholder="Current Password" name="current_password" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger btn-block mb-3" data-dismiss="modal">Deactivate</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

