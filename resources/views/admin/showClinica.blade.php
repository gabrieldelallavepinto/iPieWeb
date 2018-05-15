@extends('principal')
@section('content')

<div class="container">
  <h3>Clinica: <?php echo $clinica->direccion; ?></h3>
  <h4><?php echo $clinica->provincia.", ".$clinica->ciudad; ?></h4>
  <a href="{{url('/admin/formClinica/'.$clinica->id)}}">Editar Clinica</a>
  <a href="{{url('/admin/clinicas')}}">Lista de Clinicas</a>
</div>
@stop
