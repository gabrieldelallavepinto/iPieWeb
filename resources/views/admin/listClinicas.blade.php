@extends('principal')
@section('content')

<div class="container">
  <div class="card mx-auto">
    <div class="card">
      <div class="card-header"><h3>Clinicas</h3> </div>
      <div class="card-body">
    @foreach($clinicas as $clinica)
      <div class="form-group row">
      <div class="form-group col-md-9">
        <h4>
          <a href="{{url('/admin/formClinica/'.$clinica->id)}}"><?php echo $clinica->provincia.", ".$clinica->ciudad." ".$clinica->direccion ?></a>
        </h4>
      </div>

      <div class="form-group col-md-3">
        <a href="{{url('/admin/deleteClinica/'.$clinica->id)}}" class="btn btn-warning">Borrar</a>
      </div>
    </div>


    @endforeach
    </div>
    <a href="{{url('/admin/formClinica')}}" class="btn btn-primary">Añadir Clinica</a>
  </div>

</div>
</div>
@stop
