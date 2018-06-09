
<?php
    //separamos la fecha de la hora
    if($cita->fecha != ''){
        $fechaHora = explode(" ",$cita->fecha);
        $fechaCita = date('d-m-Y',strtotime($fechaHora[0]));
        $horaCita = date('h:i',strtotime($fechaHora[1]));
    }
    else{
        $fechaCita = date('d-m-Y');
        $horaCita = date('h:i');
    }
?>

<form action="{{ action('CitaController@store') }}" method="post">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-12"><h4>Datos de cliente</h4></div>

        <div class="d-none form-group col-md-6">
            <label for="idCliente">Id cliente</label>
            <input class="form-control" id="idCliente" name="idCliente" type="text" placeholder="idCliente" value="{{ $cliente->id }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" value="{{ $cliente->nombre }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Apellidos</label>
            <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Apellidos" value="{{ $cliente->apellidos }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tlfnFijo">Teléfono fijo</label>
            <input class="form-control" id="tlfnFijo" name="tlfnFijo" type="text" placeholder="Teléfono fijo" value="{{ $cliente->tlfnFijo }}" >
        </div>
        <div class="form-group col-md-6">
            <label for="tlfnMovil">Teléfono movil</label>
            <input class="form-control" id="tlfnMovil" name="tlfnMovil" type="text" placeholder="Teléfono movil" value="{{ $cliente->tlfnMovil }}" >
        </div>

        <div class="col-md-12"><h4>Datos de la cita</h4></div>
        <div class="form-group col-md-6">
            <label for="idClinica">Clínica</label>
            <select class="form-control" id="idClinica" name="idClinica" required>
                <option>Seleccionar clínica</option>
                @foreach($clinicas as $clinica)
                  @if ($clinica->id == $cita->idClinica)
                    <option value="{{ $clinica->id }}" selected>{{ $clinica->provincia }}, {{ $clinica->ciudad }}</option>
                  @else
                    <option value="{{ $clinica->id }}">{{ $clinica->provincia }}, {{ $clinica->ciudad }}</option>
                  @endif

                @endforeach
            </select>
        </div>
        <div class="d-none form-group col-md-6">
            <label for="idCita">Id cita</label>
            <input class="form-control" id="idCita" name="idCita" type="text" placeholder="idCita" value="{{ $cita->id }}">
        </div>
        <div class="form-group col-md-6">
            <label for="idTipo">Tipo de consulta</label>
            <select class="form-control" id="idTipo" name="idTipo" required>
                <option>Seleccionar tipo de cita</option>
                @foreach($tiposCita as $tipoCita)

                  @if ($tipoCita->id == $cita->idTipo)
                    <option value="{{ $tipoCita->id }}" style="color: {{ $tipoCita->color }};" selected>{{ $tipoCita->nombre }}</option>
                  @else
                    <option value="{{ $tipoCita->id }}" style="color: {{ $tipoCita->color }};">{{ $tipoCita->nombre }}</option>
                  @endif

                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="fecha">Fecha</label>
            <input class="form-control" id="fecha" name="fecha" data-provide="datepicker" value="{{ $fechaCita }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="hora">Hora</label>
            <input class="form-control" type="time" id="hora" name="hora" value="{{ $horaCita }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="idPodologo">Podolog@</label>
            <select class="form-control" id="idPodologo" name="idPodologo" required>
                <option>Seleccionar podolog@</option>
                @foreach($podologos as $podologo)
                    @if ($podologo->id == $cita->idPodologo)
                      <option value="{{ $podologo->id }}" selected>{{ $podologo->name }}</option>
                    @else
                      <option value="{{ $podologo->id }}">{{ $podologo->name }}</option>
                    @endif



                @endforeach
            </select>
        </div>
        <div class="d-none form-group col-md-6">
            <label for="idUsuario">idUsuario</label>
            <input class="form-control" id="idUsuario" name="idUsuario" type="text" placeholder="idUsuario" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group col-md-12">
            <label for="notas">Notas</label>
            <textarea class="form-control" rows="4" id="notas" name="notas" type="text" placeholder="Escribe las notas que necesites" required>{{ $cita->notas }}</textarea>
        </div>
            <div class="col-md-12"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </div>

</form>

    <script>
        $('#fecha').datepicker({
            language: 'es',
            format: 'dd-mm-yyyy',
        });

        $.ajax({

            url: 'cita/create',
            type: 'get',
            data: $data,
            success: function(data){
                alert(data);

            }
            error: function(jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown);
            }
            e.preventDefault();
    });
    </script>
