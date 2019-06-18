<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'HRMS') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="{{ asset('js/jquery.3.2.1.min.js') }}" defer></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script type="text/javascript" src="{{ asset('js/multiple.js') }}"></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Icons -->
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- Styles -->
   <link href="{{ asset('css/app-login.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
   <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="" style="margin-top:35%;background-color: #ffffff;box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.1);color: #525257;">
                    <div class="imgcontainer" style="padding-top:20px;">
                        <img src="{{ URL::to('/assets/img/logo_lab.png') }}" style="width: 200px; float: center;">
                    </div>
                    <div class="" style="padding-top:20px;padding-bottom:50px;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="col-md-10 offset-md-1">
                            <h3 stlye="color: #6c6c72;">Password Reset</h3>
                        <p stlye="color: #6c6c72;">Enter your account's email address and we'll send you a secure link to reset your password.</p>
                                <label stlye="color: #6c6c72;" for="email" class=""><b>{{ __('E-Mail Address') }}</b></label>

                                <div class="" >
                                    <input style="width:100%" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="col-md-10 offset-md-1">
                                    <button style="width:100%" type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="login-secondary">
             © 2019 
            <a href="">HRMS</a>
        </div>
            </div>
        </div>
    </div>
</body>
</html>
