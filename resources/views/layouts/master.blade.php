<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Nulistice Mail App</title>
        <!-- Fonts -->
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">

        <!--Stylesheets-->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{mix('css/app.css')}}"  rel="stylesheet">

    </head>
    <body>
        <div class="position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif            
        </div>
        @yield('content')        
    </body>
</html>
