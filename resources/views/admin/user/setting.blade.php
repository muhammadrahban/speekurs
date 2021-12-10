@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Account setting</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="row m-0" method="POST" action="{{ route('admin.update.setting') }}">
        @csrf
        <div class="col-md-6 row m-0">
            <div class="row px-3 px-md-0">
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('name') is-invalid @enderror">
                    <label>{{ __('Display Name') }}</label>
                    <input type="name" class="form-control border-0 p-0" name="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('email') is-invalid @enderror">
                    <label>{{ __('E-mail') }}</label>
                    <input type="email" class="form-control border-0 p-0" name="email" value="{{Auth::user()->email}}" required>
                </div>
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('password') is-invalid @enderror">
                    <label>{{ __('Change Password') }} <small>Optional</small></label>
                    <input type="password" class="form-control border-0 p-0" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="row px-3 px-md-0">
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <small>Enter current password to confirm changes</small>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control mb-3" placeholder="Current Password" name="current_password" required>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block mb-3">
                                    {{ __('Save Setting') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>      
</div>
@endsection
