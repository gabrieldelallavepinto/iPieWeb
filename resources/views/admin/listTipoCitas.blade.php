@extends('principal')
@section('content')

  <div class="container">
    <div class="card mx-auto">
      <div class="card">
        <div class="card-header"><h3>Tipos de Citas</h3> </div>

        <div class="card-body">
  @foreach($tipocitas as $tipocita)
    <div class="form-group row">
    <div class="form-group col-md-10">
      <h4> <a href="{{url('/admin/formTipoCita/'.$tipocita->id)}}"><?php echo $tipocita->nombre ?></a>  </h4>
    </div>

    <div class="form-group col-md-2">
      <a href="{{url('/admin/deleteTipoCita/'.$tipocita->id)}}" class="btn btn-warning">Borrar</a>
      </div>
   </div>
  @endforeach
  </div>
  <a href="{{url('/admin/formTipoCita')}}" class="btn btn-primary">Añadir tipo de cita</a>
</div>

</div>
</div>
@stop
