{{ App::setLocale(session('locale')) }}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'bnsite') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/showChangePasswordForm.css') }}" rel="stylesheet">
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
                    {{ config('app.name', 'bnsite') }}
                    </a>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="links nav-item dropdown">
                    <button class="btn-dark btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ App::getLocale()}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('setlocale',['locale'=>'EN'])}}">English</a></li>
                        <li><a class="dropdown-item" href="{{route('setlocale',['locale'=>'UA'])}}">Український</a></li>
                        <li><a class="dropdown-item" href="{{route('setlocale',['locale'=>'RU'])}}">Русский</a></li>
                    </ul>  
                    </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link navbar-brand active" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navbar-brand active" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
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
                                        {{ __('messages.Logout') }}
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
       
        <ul class="nav flex-column navbar-brand">
            <li class="nav-item ">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link bnSidebar">{{ __('messages.preferred_language')}}</a>
                <ul class="nav collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'RU'])}}" class="nav-link bnSidebar-dropdown">{{ __('messages.Russian')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'UA'])}}" class="nav-link bnSidebar-dropdown">@lang('messages.Ukrainian')</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'EN'])}}" class="nav-link bnSidebar-dropdown">@lang('messages.English')</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('showChangePasswordForm') }}" class="nav-link bnSidebar">{{ __('messages.Change password')}}</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link bnSidebar">{{ __('messages.user-management')}}</a>
            </li>
			<li class="nav-item">
                <a href="#" class="nav-link bnSidebar">{{ __('messages.site-management')}}</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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