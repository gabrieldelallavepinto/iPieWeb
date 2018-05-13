@extends('principal')
@section('content')

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <h3>Calendar</h3>
    <div class='container'>
        <div class="row">
            <div class='col-md-6'>
                <div id='calendar'></div>
            </div>
            <div class='col-md-6'>
                <div id='listDay'></div>
            </div>
        </div>
    </div>
    
@stop

@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/lib/jquery-ui.custom-datepicker.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale-all.js'></script>    

    <script>

        $(document).ready(function(){
            $eventos = [
                {
                    title  : 'event1',
                    start  : '2018-05-09T14:30:00',
                },
                {
                    title  : 'event2',
                    start  : '2018-05-09T13:30:00'
                },
                {
                    title  : 'event3',
                    start  : '2018-05-09T15:30:00'
                },
                {
                    title  : 'event4',
                    start  : '2018-05-09T16:30:00'
                }
            ];

            //inicializamos el calendario
            $('#calendar').fullCalendar({
                //traduccion al español
                locale: 'es',

                //vista por defecto
                //defaultView: 'listWeek',

                //limite en los eventos
                eventLimit: true, // for all non-agenda views
                views: {
                    agenda: {
                        eventLimit: 2 // adjust to 6 only for agendaWeek/agendaDay
                    }
                },
                
                //se añaden los eventos
                events: $eventos,
            })

            //inicializamos la lista
            $('#listDay').fullCalendar({
                //traduccion al español
                locale: 'es',
                
                defaultView: 'listDay',

                //vista por defecto
                //defaultView: 'listWeek',

                //se añaden los eventos
                events : $eventos,
            })
        });
    </script>

@stop
