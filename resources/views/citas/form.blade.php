
<form action="{{ action('CitaController@store') }}" method="post">
    {{ csrf_field() }}

    <div class="row">

        <div class="col-md-12"><h4>Datos de cliente</h4></div>
        <div class="d-none form-group col-md-6">
            <label for="idCliente">Id cliente</label>
            <input class="form-control" id="idCliente" name="idCliente" type="text" placeholder="idCliente" value="<?php if(isset($cliente))echo $cliente->id; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" value="<?php if(isset($cliente))echo $cliente->nombre; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Apellidos" value="<?php  if(isset($cliente))echo $cliente->apellidos; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="telFijo">Teléfono fijo</label>
            <input class="form-control" id="telFijo" name="telFijo" type="text" placeholder="Teléfono fijo" value="<?php if(isset($cliente))echo $cliente->tlfnFijo; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="telMovil">Teléfono movil</label>
            <input class="form-control" id="telMovil" name="telMovil" type="text" placeholder="Teléfono movil" value="<?php  if(isset($cliente))echo $cliente->tlfnMovil; ?>">
        </div>

        <div class="col-md-12"><h4>Datos de la cita</h4></div>
        <div class="d-none form-group col-md-6">
            <label for="idCita">Id cita</label>
            <input class="form-control" id="idCita" name="idCita" type="text" placeholder="idCita" value="<?php   if(isset($cita))echo $cita->id; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="tiposCita">Tipo de consulta</label>
            <select class="form-control" id="tiposCita" name="tiposCita">
                <option>Seleccionar tipo de cita</option>
                @foreach($tiposCita as $tipoCita)
                    <option value="{{ $tipoCita->id }}" style="color: {{ $tipoCita->color }};">{{ $tipoCita->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="fecha">Fecha</label>
            <input class="form-control" id="fecha" name="fecha" type="datetime" placeholder="Teléfono movil" value="<?php if(isset($cita)) echo $cita->fecha; ?>">
        </div>

        <div class="col-md-12"><h4>Datos de la clinica y podologo</h4></div>
        <div class="form-group col-md-6">
            <label for="tiposCita">Podologo</label>
            <select class="form-control" id="tiposCita" name="tiposCita">
                <option>Seleccionar Podologo</option>
                @foreach($podologos as $podologo)
                    <option value="{{ $podologo->id }}">{{ $podologo->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="tiposCita">Tipo de consulta</label>
            <select class="form-control" id="tiposCita" name="tiposCita">
                <option>Seleccionar clinica</option>
                @foreach($clinicas as $clinica)
                    <option value="{{ $clinica->id }}">{{ $clinica->ciudad.", ".$clinica->direccion }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-md-12">
            <label for="notas">Notas</label>
            <textarea class="form-control" rows="4" id="notas" name="notas" type="text" placeholder="Escribe las notas que necesites"><?php  if(isset($cita))echo $cita->nota; ?> </textarea>
        </div>

        <div class="col-md-12"><button type="submit" class="btn btn-primary">Guardar</button></div>
        <input type="hidden" name="idUsuario" value="{{  }}">
    </div>

</form>

@section('script')

    <script>
        $('.datepicker').datepicker();
    </script>

@stop
