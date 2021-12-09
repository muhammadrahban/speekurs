<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Speekur Admin - Login</title>
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css ') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .btn-primary {
            color: #fff !important;
            background-color: #ff9800;
            border-color: #ed8e01;
        }
        .btn-primary:hover {
            color: #fff !important;
            background-color: #e18907;
            border-color: #e18907;
        }
        .is-invalid{
        border:1px solid #dc3545;
        }
        .is-invalid .invalid-feedback{
        display: block;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 px-5 py-3 d-flex align-items-center justify-content-center">
                                <img class="w-100 w-lg-auto" src="{{ asset('assets/front/images/Speekur_website_logo.png')}}">
                            </div>
                            <div class="col-lg-6">
                                <div class="py-0 py-lg-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="row m-0 px-3" method="POST" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="col-12 bg-white mb-3 py-2 rounded  @error('email') is-invalid @enderror">
                                            <label>{{ __('E-mail') }}</label>
                                            <input type="email" class="form-control border-0 p-0" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-12 bg-white mb-3 py-2 rounded  {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                            <label>{{ __('Password') }}</label>
                                            <input type="password" class="form-control border-0 p-0" name="password" required placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 py-2">
                                            <button type="submit" class="btn btn-primary rounded btn-lg btn-block py-3">{{ __('SIGN IN') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>

