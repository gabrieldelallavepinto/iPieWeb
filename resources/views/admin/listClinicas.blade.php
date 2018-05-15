@extends('principal')
@section('content')

<div class="container">
  @foreach($clinicas as $clinica)
  <h3>
    <a href="{{url('/admin/showClinica/'.$clinica->id)}}"><?php echo $clinica->provincia.", ".$clinica->ciudad." ".$clinica->direccion ?></a>
    <a href="{{url('/admin/deleteClinica/'.$clinica->id)}}">Borrar</a>
  </h3>
  @endforeach
  <a href="{{url('/admin/formClinica')}}">Añadir Clinica</a>
</div>
@stop
