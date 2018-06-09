@extends('principal')
@section('content')
{{-- <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"> --}}

    {{-- script para calendario --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div class='container-fluid'>
        <div class="row">
            <div class='col-md-12'>
                <div class="card mx-auto">
                    <div class="card-header"><h2>Calendario</h2></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">

                                <form id="datos" action="{{ action('CitaController@store') }}" method="post">

                                    <div class="form-group col-md-4">
                                        <label for="clinica">Clinica</label>
                                        <select class="form-control" id="clinica" name="clinica" selected="{{ $datos['clinica'] }}">
                                            <option value=''>Todas las clínicas</option>
                                            @foreach($clinicas as $clinica)
                                                @if($datos['clinica'] == $clinica->id)
                                                    <option value="{{ $clinica->id }}" selected>{{ $clinica->ciudad }}</option>
                                                @else
                                                    <option value="{{ $clinica->id }}" >{{ $clinica->ciudad }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-md-5 calendario'>
                                {{-- calendario --}}
                                <div id="datepicker" data-date="{{ $fecha }}" style="margin-left: 25%;"></div>
                            </div>
                            <div class='col-md-7'
                            style="border-left: 1px solid rgba(0, 0, 0, 0.125);">
                                @include('citas.index')
                            </div>
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

        
        
        //editamos la cita al darle click
        $('.cita').on('click',function(){
            $idCita = $(this).attr("id");

            $datos = '?idCita='+$idCita;
            
            window.location.href = "{{ route('cita.edit') }}"+$datos;
        });

        
        $(function(){
            $('[data-toggle="tooltip"]').tooltip()
        })
        
        //al cambiar el imput clinica
        $('#clinica').change(function(){
            $datos = datos();

            window.location.href = "/calendario"+$datos;
        });
        //al cambiar el calendario
        $('#datepicker').on('changeDate', function() {
            $datos = datos();

            window.location.href = "/calendario"+$datos;
        });
        function datos(){
            $datos = '?';
            $datos += $('#datos').serialize();

            $fecha =  $('#datepicker').datepicker('getFormattedDate');
            $datos += '&fecha='+$fecha;

            return $datos;
        }

    </script>
@stop
