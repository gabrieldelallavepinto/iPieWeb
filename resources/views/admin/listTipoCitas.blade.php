@extends('principal')
@section('content')

<div class="container">
  @foreach($tipocitas as $tipocita)
  <h3>
    <a href="{{url('/admin/showTipoCita/'.$tipocita->id)}}"><?php echo $tipocita->nombre ?></a>
    <a href="{{url('/admin/deleteTipoCita/'.$tipocita->id)}}">Borrar</a>
   </h3>
  @endforeach
  <a href="{{url('/admin/formTipoCita')}}">Añadir tipo de cita</a>
</div>
@stop
