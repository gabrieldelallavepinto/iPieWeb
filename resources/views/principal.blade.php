<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iPie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        
        <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.standalone.css')}}">
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
        <!-- Languaje -->
        <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>


    </head>
    <body>
        
        @include('layout')

        <div class="content-wrapper" style:"margin-top: 55px;">
            @yield('content')
        </div>



        @yield('script')
        
    </body>
</html>
