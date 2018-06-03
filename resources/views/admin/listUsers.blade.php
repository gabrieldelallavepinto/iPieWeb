@extends('principal')
@section('content')

<div class="container">
  <div class="card mx-auto">
    <div class="card">
      <div class="card-header"><h3>Lista de Usuarios</h3> </div>

      <div class="card-body">
        @foreach($users as $user)
          <div class="form-group row">
              <div class="form-group col-md-10">
              <h4>
                <a href="{{url('/admin/formUser/'.$user->id)}}"><?php echo $user->name ?></a>
              </h4>
              </div>
              <div class="form-group col-md-2">
                  <a href="{{url('/admin/deleteUser/'.$user->id)}}" class="btn btn-warning">Borrar</a>
              </div>
          </div>
        @endforeach

      </div>
      <a href="{{url('/admin/formUser')}}" class="btn btn-primary">Añadir Usuario</a>
    </div>
  </div>
</div>
@stop
