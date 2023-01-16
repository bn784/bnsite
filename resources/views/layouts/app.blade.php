{{ App::setLocale(Auth::user()->preferred_language) }}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'bnsite') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<style type="text/css">
.wrapper {
    left: 0;
    top: 0;
    padding-top: 55px;
	width: 100%;
}
.content{
    margin-left: 250px;
    background-color:  ;
    width: 100%;
}
.content.active{
    margin-left: 0px;
}
.sidebar{
    background-color: rgb(80,80,80);
    position: fixed;
    width: 250px;
    height: 100vh;
}
.sidebar.active{
    margin-left: -250px;
}
.btnSidebar{    
    width: 250px;
    overflow: hidden ;  
}
.btnSidebar:hover{
    background-color:  rgb(95, 21, 21);  
}
.btnSidebar:active{
    background-color:  rgb(71, 10, 10);  
}
.btnSidebar-dropdown{
    background-color: rgb(15, 50, 15);
    width: 250px;
    overflow: hidden;  
}
.btnSidebar-dropdown:hover{
    background-color:   rgb(9, 80, 9);  
}
.btnSidebar-dropdown:active{
    background-color:   rgb(9, 70, 9);  
}
.change_password{
    height: 95vh;
    background-color:cyan;
    width: 100%;
}
.bn{
    height: 500px;
   /* background-color:green;*/
    width: 700px;
    align-content: center;
}
</style>
</head>
<body>
    <div id="app">
        <!-- topbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid">
                <button id="Toggle_Sidebar" class=" btn btn-success nav-link navbar-brand">{{ __('messages.Sidebar') }}</button>
                    <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand nav-link active" href="{{ url('/') }}">
                    {{ __('messages.Website') }}
                    </a>
                    @can('admin_access')
                    <li class="nav-item">
                    <a class="navbar-brand nav-link active btn btn-warning" href="">can only see the admin access</a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li class="nav-item">
                    <a class="navbar-brand nav-link active btn btn-danger" href="">can only see the user access</a>
                    </li>
                    @endcan
                    @can('bn_policy')
                    <li class="nav-item">
                    <a class="navbar-brand nav-link active btn btn-danger" href="">can only see the bn_policy</a>
                    </li>
                    @endcan
                </ul>
                    <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="{{ route('login') }}" onclick="event.preventDefault();">{{ __('messages.Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                    </li>
                    @else
                    <li class="links nav-item dropdown">
                        <button class="btn-dark btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form2').submit();">{{ __('messages.Logout') }}</a>
                            </li>
                            <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>  
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!-- end topbar -->
		<div class="wrapper">
        <!-- sidebar -->
        <ul id="sidebar" class="nav flex-column navbar-brand sidebar">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link btnSidebar text-white">{{ __('messages.Home')}}</a>
            </li>
            <li class="nav-item ">
                <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link btnSidebar text-white">{{ __('messages.preferred_language')}}</a>
                <ul class="nav collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'RU'])}}" class="nav-link btnSidebar-dropdown text-white">{{ __('messages.Russian')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'UA'])}}" class="nav-link btnSidebar-dropdown text-white">@lang('messages.Ukrainian')</a>
                    </li>
                    <li>
                        <a href="{{ route('preferred_language', ['lang' => 'EN'])}}" class="nav-link btnSidebar-dropdown text-white">@lang('messages.English')</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('showChangePasswordForm') }}" class="nav-link btnSidebar text-white">{{ __('messages.Change password')}}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link btnSidebar text-white">{{ __('messages.user-management')}}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link btnSidebar text-white">{{ __('messages.Role management')}}</a>
            </li>
			<li class="nav-item">
                <a href="{{ route('site_management') }}" class="nav-link btnSidebar text-white">{{ __('messages.site-management')}}</a>
            </li>
        </ul>
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
</script>
</body>
</html>