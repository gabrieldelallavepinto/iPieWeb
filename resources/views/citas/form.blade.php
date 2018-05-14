@extends('principal')
@section('content')

<div class="" style="margin-left: 20px;margin-right: 20px;">
    <div class="card mx-auto">
        <div class="card-header">Citas</div>
        <div class="card-body">
            <form action="{{ action('CitaController@saveCita') }}" method="post">
                {{ csrf_field() }}

                <div class="row">

                <div class="col-md-12"><h4>Datos de cliente</h4></div>

                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Apellidos">
                </div>
                <div class="form-group col-md-6">
                    <label for="telFijo">Teléfono fijo</label>
                    <input class="form-control" id="telFijo" name="telFijo" type="text" placeholder="Teléfono fijo">
                </div>
                <div class="form-group col-md-6">
                    <label for="telMovil">Teléfono movil</label>
                    <input class="form-control" id="telMovil" name="telMovil" type="text" placeholder="Teléfono movil">
                </div>

                <div class="col-md-12"><h4>Datos de la cita</h4></div>

                <div class="form-group col-md-6">
                    <label for="tiposCita">Tipo de consulta</label>
                    <select class="form-control" id="tiposCita" name="tiposCita">
                        <option>Seleccionar tipo de cita</option>
                        @foreach($tiposCita as $tipoCita)
                            <option value="{{ $tipoCita->id }}" >{{ $tipoCita->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha</label>
                    <input class="form-control" id="fecha" name="fecha" type="date" placeholder="Teléfono movil" value="{{ date("m-d-y") }}?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="hora">Hora</label>
                    <input class="form-control" id="hora" type="time" name="hora" >
                </div>
                <div class="form-group col-md-12">
                    <label for="notas">Notas</label>
                    <textarea class="form-control" rows="4" id="notas" name="notas" type="text" placeholder="Escribe las notas que necesites"></textarea>
                </div>

                <div class="col-md-12"><button type="submit" class="btn btn-primary">Guardar</button></div>


            </form>
        </div>
        </div>
    </div>
</div>

@stop
