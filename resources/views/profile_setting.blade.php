@extends('layouts.app')
@section('title' )
@section('content')
<div class="col-lg-6 order-1 order-lg-2 pt-3">
    <div class="p-0">
        <h3 class="text-center mt-5">Edit Profile</h3>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('setprofile') }}">
                @csrf
                <div class="row align-items-center mb-4">
                    <div class="col-4 text-center text-md-left font-weight-bold text-primary">Remove Photo</div>
                    <div class="col-4 text-center">
                        <img height="70" src="{{URL('/')}}/image/{{Auth::user()->image}}">
                    </div>
                    <div class="col-4 text-center text-md-right font-weight-bold text-primary">Change Photo</div>

                </div>
                  
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('name') is-invalid @enderror">
                    <label>{{ __('Display Name') }}</label>
                    <input type="name" class="form-control border-0 p-0" name="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('dob') is-invalid @enderror">
                    <label>{{ __('Date of Birth') }}</label>
                    <input type="date" class="form-control border-0 p-0" name="dob" value="{{Auth::user()->created_at}}" required>
                </div>
                <div class="col-md-12 bg-white mb-3 py-2 rounded shadow @error('dob') is-invalid @enderror">
                    <label>{{ __('Country') }}</label>
                    <select class="form-control border-0 p-0" name="county" required>
                        <option value="Australia">Australia</option>    
                        <option value="China">China</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="India">India</option>
                    </select>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <small>Enter current password to confirm changes</small>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control mb-3" placeholder="Current Password" name="current_password" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block mb-3">
                            {{ __('Save Profile') }}
                        </button>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-12">
                        <hr>
                        <div class="p-3 shadow rounded bg-white">
                            <a class="d-block" href="{{ Route('account')}}">Change Account Information</a>
                            <label for="newsletter"><input type="checkbox" id="newsletter"> Receive update and news from Speekur</label>
                        </div>
                    </div>
                </div>
            </form>         
        </div>
    </div>
</div>
@endsection

