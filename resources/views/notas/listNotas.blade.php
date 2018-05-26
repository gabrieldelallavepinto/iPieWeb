


<div class="container">
  <h2>Notas del <?php echo $fecha ?></h2>

  @foreach($notas as $nota)
  <h3>
    <p>
        <a href="{{url('/showNota/'.$nota->id)}}"><?php echo $nota->descripcion; ?></a>
    </p>
  </h3>
  @endforeach
  <a href="{{url('/formNota')}}">Añadir nota</a>
</div>
