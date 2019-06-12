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
    <div class="wrapper">
        
        <div class="login-main">
            <div class="imgcontainer">
                <img src="{{ URL::to('/assets/img/logo_lab.png') }}" style="width: 300px; float: center;">
            </div>
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="">
                        <label for="email" class=""><b>{{ __('E-Mail Address') }}</b></label>

                        <div class="" >
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label for="password" class=""><b>{{ __('Password') }}</b></label>

                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <div class="">
                            <div class=" ">
                                <div>
                                    <br>
                                    <p>Don't have account? <a href="{{route('register')}}">{{ __(' · Sign Up') }} </a></p>
                                    

                                </div>
                                <label class="" for="remember">
                                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('  Remember Me')}}
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __(' · Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="">
                            <button type="submit" class="">
                                {{ __('Login') }}
                            </button>

                            
                        </div>
                    </div>
                </form>
                <div class="help-div">
					<p>
						Need help? <a href="">Visit our Help Center.</a>
					</p>
				</div>
            </div>
        </div>
        <div class="login-secondary">
             © 2019 
            <a href="">HRMS</a>
        </div>
    </div>
</div>
</body>
</html>
