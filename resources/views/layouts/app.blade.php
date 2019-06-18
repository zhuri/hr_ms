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
   <script type="text/javascript" src="{{ asset('js/indexTable.js') }}"></script>
   

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Icons -->
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
   <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/create-edit.css') }}" rel="stylesheet"> 
</head>
<body style="margin:0 auto;">
   <div id="app">
   <div class="h " id="myHeader" style="position: sticky;top: 0;z-index: 1;">
       <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color:white;" >
           <div class="container" style="display:flex;justify-content: flex-start;padding-right: 0;padding-left: 0;margin-right: 0px;margin-left: 5%;">
           
               <a class="col-md-11" href="{{ url('/home') }}" >
               <img src="{{ URL::to('/assets/img/logo_lab.png') }}" style="width:120px;">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                   <span class="navbar-toggler-icon"></span>
               </button>
                <div class="collapse navbar-collapse col-md-1" id="navbarSupportedContent" >
                   <!-- Left Side Of Navbar -->

                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ml-auto">
                       <!-- Authentication Links -->
                       @guest
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                           </li>
                           @if (Route::has('register'))
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                               </li>
                           @endif
                       @else
                           <!-- user name in header -->
                           <li class="">
                               <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }}
                               </a>
                           </li>

                           <!-- logout (in the header area)-->
                           <li class="col-md-offset-2">
                               <a id="navbarDropdown" class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                           </li>
                       @endguest
                   </ul>
               </div>
           </div>
       </nav>
</div>
       <main class="">
           <div class="container1">
               <div class="layout-nav col-md-2" id="navbar">
                <div style="height:70%;">
                    <div>
                        <ul>
                            <li class="home-nav-item">
                                <a href="" class="dashboard">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="margin">  Dashboard</span>
                                </a>
                            </li>
                            <li class="manage-people-nav-item">
                                <a href="{{ url('/users') }}" class="manage-people">
                                    <i class='far fa-user-circle'></i>
                                    <span class="margin">Users</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li class="run-payroll-nav-item">
                                <a href="{{ url('/payrolls') }}" class="run-payroll">
                                    <i class="fa fa-dollar"></i>
                                    <span class="margin">Payroll</span>
                                </a>
                            </li>
                            <!--
                            <li class="pay-contractors-nav-item">
                                <a href="" class="pay-contractors">
                                    <i class="fa fa-money"></i>
                                    <span class="margin">Pay Contractors</span>
                                </a>
                            </li>
                            <li class="benefits-nav-item">
                                <a href="" class="benefits">
                                    <i class="fa fa-heart-o"></i>
                                    <span class="margin">Benefits</span>
                                </a>
                            </li>
    -->
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li class="team-insights-nav-item">
                                <a href="{{ url('/recruitments') }}" class="team-insights">
                                    <i class="fa fa-bar-chart"></i>
                                    <span class="margin">Recruitments</span>
                                </a>
                            </li>
                            <li class="reports-nav-item">
                                <a href="" class="reports">
                                    <i class="fa fa-folder-o"></i>
                                    <span class="margin">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <!--
                            <li class="referrals-nav-item">
                                <a href="" class="referrals">
                                    <i class="fa fa-gift"></i>
                                    <span class="margin">Referrals</span>
                                </a>
                            </li>
    -->
                            <li class="documents-nav-item">
                                <a href="{{ url('/tasks') }}" class="documents">
                                    <i class='far fa-file-alt'></i>
                                    <span class="margin">Tasks</span>
                                </a>
                            </li>
                            <li class="help-nav-item">
                                <a href="{{ url('/user_requests') }}" class="help">
                                    <i class='far fa-question-circle'></i>
                                    <span class="margin">User Requests</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                        <li class="company-details-nav-item">
                                <a href="{{ url('/departments') }}" class="company-details">
                                    <i class="fa fa-building-o"></i>
                                    <span class="margin">Departments</span>
                                </a>
                            </li>
                            <li class="company-details-nav-item">
                                <a href="" class="company-details">
                                    <i class="fa fa-building-o"></i>
                                    <span class="margin">Position</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                   </div>
                   <div class="layout-nav-footer">
                       <div>Secure Connection</div>
                       <div>
                           <a href="">Terms</a>
                           &nbsp;&amp;&nbsp;
                           <a href="">Privacy</a>
                       </div>
                   </div>
               </div>
               <div class="layout-main col-md-9 offset-md-2">
                   <br>
                        @yield('content')
               </div>
           </div>

      </main>
  </div>
</body>
</html>