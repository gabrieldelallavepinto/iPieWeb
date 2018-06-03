@extends('principal')
@section('content')
  <div class="container">
    <div class="card mx-auto">
      <div class="card">
        <div class="card-header"><h3>Clinica</h3> </div>

        <div class="card-body">

  <form action="{{ action('ClinicaController@saveClinica') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12"><h4>Datos de la clinica</h4></div>
        <div class="form-group col-md-6">
          <label for="ciudad">Ciudad : </label>
          <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value="<?php if(isset($clinica)) echo $clinica->ciudad;?>" required><br>
        </div>
        <div class="form-group col-md-6">
          <label for="provincia">Provincia: </label>
          <input type="text" class="form-control" name="provincia" placeholder="Provincia" value="<?php if(isset($clinica)) echo $clinica->provincia;?>" required><br>
        </div>
    <div class="form-group col-md-6">
      <label for="direccion">Dirección: </label>
      <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php if(isset($clinica)) echo $clinica->direccion;?>" required><br>
    </div>
    <input type="hidden" name="id" value="<?php if(isset($clinica)) echo $clinica->id;?>" >
    <div class="col-md-12"><input type="submit" class="btn btn-primary" value="Guardar"></div>

  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
</div>
@stop
