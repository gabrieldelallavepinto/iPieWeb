@extends('principal')
@section('content')
<link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">

    {{-- script para calendario --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div class='container-flex'>
        <div class="" style="margin-left: 20px;margin-right: 20px;">
            <div class="card mx-auto">
                <div class="card-header"><h2>Calendario</h2></div>
                <div class="card-body">
                    <div class="row">
                        <div class='col-md-5 calendario'>
                            {{-- calendario --}}
                            <div id="datepicker" data-date="{{ $fecha }}"></div>
                        </div>
                        <div class='col-md-7'>
                            @include('citas.index')
                        </div>
                    </div>  
                </div>
            </div>
        </div>

        @include('calendario.botones')

    </div>
    
@stop



@section('script')
    <script>
        $('#datepicker').datepicker({
            language: 'es',
            format: 'yyyy-mm-dd',
        });

        $('#datepicker').on('changeDate', function() {
            $fecha =  $('#datepicker').datepicker('getFormattedDate');
            window.location.href = "/calendario/"+$fecha;
        });

        $('#datepicker').on('click',function(){
            console.log('hola');
        });

        
        //editamos la cita al darle click
        $('.cita').on('click',function(){
            $idCita = $(this).attr("id");
            window.location.href = "cita/edit/"+$idCita;
        });

        //al seleccionar un dia
        $('.fecha').on('click',function(){
            $fecha = $(this).attr("value");
            window.location.href = "/calendario/"+$fecha;
        });
        
        $(function(){
            $('[data-toggle="tooltip"]').tooltip()
        })
        
    </script>
@stop
