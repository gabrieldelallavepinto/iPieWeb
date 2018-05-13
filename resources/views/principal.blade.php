<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    </head>
    <body>
        
        @include('layout')
        <div class="content-wrapper" style:"">
                    @yield('content')
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>

        @yield('script')
        
    </body>
</html>
