<div class="container">
  <h3>Usuario</h3>
  <form action="{{ action('ClinicaController@saveClinica') }}" method="post">
    {{ csrf_field() }}
    <label for="ciudad">Ciudad : </label>
    <input type="text" name="ciudad" value="<?php if(isset($clinica)) echo $clinica->ciudad;?>"><br>
    <label for="provincia">Provincia: </label>
    <input type="text" name="provincia" value="<?php if(isset($clinica)) echo $clinica->provincia;?>"><br>
    <label for="direccion">Direccion: </label>
    <input type="text" name="direccion" value="<?php if(isset($clinica)) echo $clinica->direccion;?>"><br>
    <input type="hidden" name="id" value="<?php if(isset($clinica)) echo $clinica->id;?>">

    <input type="submit"  value="Guardar">
  </form>
  <a href="{{url('/admin/clinicas')}}">Lista de Clinicas</a>
</div>
