@extends('principal')
@section('content')
    {{-- script para calendario --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div class='container'>
        <div class="row">
            <div class='col-md-6'>
                {{-- calendario --}}
                <div class="fecha" value="2018-02-22">2018-02-22</div>
                <div class="fecha" value="2018-02-23">2018-02-23</div>
            </div>
            <div class='col-md-6'>
                @include('citas.index')
            </div>
        </div>

    </div>
    
@stop



@section('script')
    <script>
        console.log('hola');

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

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
