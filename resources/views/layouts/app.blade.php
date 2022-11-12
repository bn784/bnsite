{{ App::setLocale(session('locale')) }}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- topbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid">
                <button id="Toggle_Sidebar" class=" btn btn-info nav-link navbar-brand">Toggle Sidebar</button>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand nav-link active" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    </a>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link navbar-brand active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navbar-brand active" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-brand active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end topbar -->
		<div class="wrapper">
        <!-- sidebar -->
        <div  id="sidebar" class="sidebar">
       
        <ul class="nav flex-column navbar-brand ">
            <li class="nav-item ">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link bnSidebar">@lang('messages.preferred_language')</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'ru'])}}" class="nav-link bnSidebar">@lang('messages.RU')</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'uk'])}}" class="nav-link bnSidebar">@lang('messages.UKR')</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'en'])}}" class="nav-link bnSidebar">@lang('messages.EN')</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link bnSidebar">About</a>
            </li>
            
        </ul>
   
               
        </div>
        <!-- end sidebar -->
        <!-- content -->
        <div  id="content" class="content">
            @yield('content')
        </div>
         <!-- end content -->
		</div>
    </div>
    <!-- javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//sidebar Toggle
$(document).ready(function () {
     $('#Toggle_Sidebar').on('click', function () {
     $('#sidebar').toggleClass('active');
     $('#content').toggleClass('active');
     });
});
</script>
</body>
</html>