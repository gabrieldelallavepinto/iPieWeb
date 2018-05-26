<div class="container">
  <h3>Nota de: <?php echo $user->name; ?></h3>
  <h4><?php echo $nota->descripcion; ?></h4>

  @if(Auth::user()->id == $user->id || Auth::user()->name == admin)
  <a href="{{url('/formNota/'.$nota->id)}}">Editar Nota</a><br>
  <a href="{{url('/deleteNota/'.$nota->id)}}">Borrar</a>
  @endif
  <br>
  <a href="{{url('/notas/'.$nota->fecha)}}">Lista de notas</a>
</div>
