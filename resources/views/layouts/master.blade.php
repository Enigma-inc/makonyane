<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Fonts -->
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">

        <!--Stylesheets-->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{mix('css/app.css')}}"  rel="stylesheet">

    </head>
    <body>
        @yield('content')        
    </body>
</html>
