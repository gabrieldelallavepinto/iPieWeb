
<div class="container">
  
  <form action="{{ action('TipoCitaController@saveTipoCita') }}" method="post">
    {{ csrf_field() }}
    <label for="nombre">Tipo de cita : </label>
    <input type="text" name="nombre" value="<?php if(isset($tipocita)) echo $tipocita->nombre;?>"><br>
    <label for="descripcion">Descripción: </label><br>
    <textarea name="descripcion" rows="8" cols="80" value=""><?php if(isset($tipocita)) echo $tipocita->descripcion;?></textarea> <br><br>
    <label for="color">Color: </label>
    <input type="color" name="color" value="<?php if(isset($tipocita)) echo $tipocita->color;?>"><br>
    <input type="hidden" name="id" value="<?php if(isset($tipocita)) echo $tipocita->id;?>">

    <input type="submit"  value="Guardar">
  </form>
  <a href="{{url('/admin/tipocitas')}}">Lista de tipos de citas</a>
</div>
