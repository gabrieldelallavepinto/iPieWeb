<div class="container">
  <h3>Nota</h3>
  <form action="{{ action('NotaController@saveNota') }}" method="post">
    {{ csrf_field() }}
    <label for="descripcion">Descripcion: </label><br>
    <textarea name="descripcion" rows="8" cols="80"><?php if(isset($nota)) echo $nota->descripcion;?></textarea><br><br>
    <label for="fecha">Fecha: </label>
    <input type="date" name="fecha" value="<?php if(isset($nota)) echo $nota->fecha;?>"><br>
    <input type="hidden" name="idUsuario" value="<?= Auth::user()->id; ?>"><br>
    <input type="hidden" name="id" value="<?php if(isset($nota)) echo $nota->id;?>">
    <input type="submit"  value="Guardar">
  </form>
  <a href="{{url('/notas/'.$fecha)}}">Lista de Notas</a>
</div>
