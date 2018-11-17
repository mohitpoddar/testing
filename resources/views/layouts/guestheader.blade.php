<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"> -->

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-datetimepicker.min.css">
    <!-- ===== Bootstrap CSS ===== -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <!-- ===== Custom CSS ===== -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Background image -->
    <style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */
        background-image: url("/assets/img/background.jpg");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

</head>
<body>
    <div class="bg" id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

	                <div class="header-left">
	                    <a href="/" class="logo">
							<img src="/assets/img/logo.png" width="175" height="50" alt="logo">
						</a>
	                </div>
					
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
					<!-- Center Of Navbar -->
					<ul><a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.longname', 'Laravel') }}</a></ul>	
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">@lang('Login')</a></li>
                            <li><a href="{{ route('register') }}">@lang('Register')</a></li>
                        @else
                            <li class="dropdown">
								<!--  <span class="user-img"><img class="img-circle" src="/assets/img/user.jpg" width="40" alt={{ Auth::user()->name }}> -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('Logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <div class="sidebar-overlay" data-reff="#sidebar"></div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
	<script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.slimscroll.js"></script>
	<script type="text/javascript" src="/assets/plugins/morris/morris.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/raphael/raphael-min.js"></script>
	<script type="text/javascript" src="/assets/js/app.js"></script>
	
</body>
</html>
