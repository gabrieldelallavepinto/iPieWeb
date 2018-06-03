@extends('principal')
@section('content')
  <div class="container">
    <div class="card mx-auto">
      <div class="card">
        <div class="card-header"><h3>Tipo de Cita</h3> </div>

        <div class="card-body">
  <form action="{{ action('TipoCitaController@saveTipoCita') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12"><h4>Datos del Tipo</h4></div>
        <div class="form-group col-md-6">
          <label for="nombre">Tipo de cita : </label>
          <input type="text" class="form-control" name="nombre" value="<?php if(isset($tipocita)) echo $tipocita->nombre;?>" required><br>
        </div>

        <div class="form-group col-md-6">
          <label for="color">Color: </label>
          <input type="text" class="form-control" name="color" id="color" value="<?php if(isset($tipocita)) echo $tipocita->color;?>" required>
        </div>

        <div class="form-group col-md-12">
          <label for="descripcion">Descripción: </label><br>
          <textarea name="descripcion" class="form-control" rows="8" cols="80" value="" required><?php if(isset($tipocita)) echo $tipocita->descripcion;?></textarea>
        </div>

    <input type="hidden" name="id" value="<?php if(isset($tipocita)) echo $tipocita->id;?>">

    <div class="col-md-12"><input type="submit"  class="btn btn-primary" value="Guardar"></div>
  </form>

</div>
</div>
</div>
</div>
</div>
</div>
<script>
    $ ( '#color' ). colorpicker ({});
</script>
@stop
