@extends('welcome')
@section('content')

    <div class='prueba'> hofdpskgodfkgpfdg </div>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <h3>Calendar</h3>
    <div class='container'>
        <div class='col-md-12'>
        <div id='calendar'></div>
        </div>
    </div>
@stop

@section('script')
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale-all.js'></script>

    <script>
        
        $(document).ready(function(){
            //inicializamos el calendario
            $('#calendar').fullCalendar({
                locale: 'es',

                //vista por defecto
                //defaultView: 'listWeek',

                //se añaden los eventos
                events : [

                ],
            })
        });
    </script>

@stop
