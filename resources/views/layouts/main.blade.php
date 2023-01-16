@auth
{{ App::setLocale(Auth::user()->preferred_language) }}
@else
@if (session('locale'))
{{ App::setLocale(session('locale')) }}
@else
{{ App::setLocale('UA') }}
@endif
@endauth
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

     <!-- javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- Styles -->
<style type="text/css">
.main {
    left: 0;
    top: 0;
    padding-top: 55px;   
	width: 100%;
}
.rowbnsite {
    /*height: 100vh;*/
    height: 200px;	
}
.bnsiteChange.active {
    background-color:pink;
}
.bnsiteChange.hover {
    background-color:gold;
}
.rowbnsite {
    width: 100%;
    height: 100vh;
}
div.rowbnsite {
    text-align: center;
    border-style :"solid";
    font-weight: bold;
}
#row1 {
    background-image: url("{{asset('images/Mass.jpg')}}");
    opacity: 0.8;
    z-index: 2;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
#row2 {
    background-color: rgba(0, 255, 0, 0.5);
}
#row3 {
    background-color: rgba(0, 200, 100, 0.5);
}
#row4 {
    background-color: rgba(50, 150, 50, 0.5);
}
#row5 {
    background-color: rgba(100, 50, 50, 0.5);
}
#row6 {
    background-color: rgba(200, 100, 100, 0.5);
}
</style>
   
<title>{{ config('app.name', 'bnsite') }}</title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid">
                
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" id="menu">
					<li class="nav-item">
                        <a class="nav-link navbar-brand " href="#row1" aria-current="page">row1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand " href="#row2" aria-current="page">row2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="#row3" aria-current="page">row3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="#row4" aria-current="page">row4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="#row5" aria-current="page">row5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="#row6" aria-current="page">row6</a>
                    </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto top-right">
                    @can('admin_access')   
                    <li class="links nav-item">
                    <button id="change" type="button" class="btn-info btn">
                    {{ __('messages.Change')}}
                    </button>
                    </li>
                    @endcan
                    <li class="links nav-item">
                    <button id="modal_phone" type="button" class="btn btn-primary change"> 
                    @if (app()->getLocale() == 'UA')
                    {{ App\Bnsitecontent::where('title', 'modal_phone')->firstOrFail()->content_ua }}
                    @endif
                    @if (app()->getLocale() == 'RU')
                    {{ App\Bnsitecontent::where('title', 'modal_phone')->firstOrFail()->content_ru }}
                    @endif
                    @if (app()->getLocale() == 'EN')
                    {{ App\Bnsitecontent::where('title', 'modal_phone')->firstOrFail()->content_en }}
                    @endif
                    </button>
                    </li>
                   
                    <li class="links nav-item">
                    <button id="modal_phone_2" type="button" class="btn-danger btn change">
                    {{ __('messages.phone')}}: {{App\Bnsitecontent::where('title', 'modal_phone_2')->firstOrFail()->content_en}}
                    </button>
                    </li>
                    <li class="links nav-item">
                    <button id="phone_2" type="button" class="btn-secondary btn change">
                    {{ __('messages.phone')}}: {{App\Bnsitecontent::where('title', 'phone_2')->firstOrFail()->content_en}}
                    </button>
                    </li>
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
                        <a class="nav-link navbar-brand active " href="{{ route('home') }}">{{ __('messages.Home')}}</a>
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
 <script>
//smooth transition
$(document).ready(function(){
    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top - 50;
        $('body,html').animate({scrollTop: top}, 0);
    });
    //
    $("#change").click(function(){
        $(".change").attr("data-bs-toggle","modal").attr("data-bs-target","#exampleModal").addClass("bnsiteChange").css({"border-style" :"solid","border-color":"gold"});
        $(".bnsiteChange").on({
            mouseenter: function(){
                $(this).addClass("hover"); //добавляем класс текущей
            },  
            mouseleave: function(){
                $(this).removeClass("hover"); //удаляем класс текущей
            }, 
            click: function(){
                var attr_id = $(this).attr("id");
                $("#exampleModalLabel").text(attr_id);
                $("#title_input").val(attr_id);    
            }  
        });
    }); 
   //
    if ({{ session('show_on_site') }} !== 'welcome') {
        $("#{{ session('show_on_site') }}").attr("data-bs-toggle","modal").attr("data-bs-target","#exampleModal")
        .addClass("bnsiteChange").css({"border-style" :"solid","border-color":"gold"});
        $(".bnsiteChange").on({
            mouseenter: function(){
                $(this).addClass("hover"); //добавляем класс текущей
            },  
            mouseleave: function(){
                $(this).removeClass("hover"); //удаляем класс текущей
            }, 
            click: function(){
                var attr_id = $(this).attr("id");
                $("#exampleModalLabel").text(attr_id);
                $("#title_input").val(attr_id);    
            }  
        });
    };  
});


</script>
@if(session('warning'))
            <!-- If password successfully show message -->
<script> 
    alert("{{ session('warning') }}");
</script>
@endif
@if(session('success'))
            <!-- If password successfully show message -->
 <script> 
    alert("{{ session('success') }}");
</script>            
@endif
@if( $errors->has('content_en'))
 <script> 
    alert("The content en must be a string.");
</script>            
@endif
@if( $errors->has('content_ru'))
 <script> 
    alert("The content ru must be a string.");
</script>            
@endif
@if( $errors->has('content_ua'))
 <script> 
    //alert("The content ua must be a string.");
</script>            
@endif

</body>
</html>

