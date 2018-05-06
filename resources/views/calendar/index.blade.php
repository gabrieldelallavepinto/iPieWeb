@extends('welcome')
@section('content')

    <div class='prueba'> hofdpskgodfkgpfdg </div>

@stop

@section('script')

    <script>
        console.log('hola');
        $(document).ready(function() {

            
            $('.prueba').on('click',function(){
                console.log('funciona');
            });
        });
        
    </script>

@stop
