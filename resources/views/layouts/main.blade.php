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
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
   
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid">
                
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" id="menu">
					<li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row1" aria-current="page">row1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row2" aria-current="page">row2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row3" aria-current="page">row3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row4" aria-current="page">row4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row5" aria-current="page">row5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#row6" aria-current="page">row6</a>
                    </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto top-right">
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
                    @auth
					<li class="nav-item">
                        <a class="nav-link navbar-brand active " href="{{ route('home') }}">Home</a>
                    </li>
					@endauth
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link navbar-brand active " href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navbar-brand active" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main">
            @yield('content')
        </main>
    </div>

    <!-- javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//smooth transition
 $(document).ready(function(){
    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top - 50;
        $('body,html').animate({scrollTop: top}, 0);
    });
});
</script>


</body>
</html>

 