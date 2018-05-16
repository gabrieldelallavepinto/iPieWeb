@extends('principal')
@section('content')
<div class="" style="margin-left: 20px;margin-right: 20px;">
    <div class="card mx-auto">
        <div class="card-header"><h2>Crear Usuario</h2></div>
        <div class="card-body">
            <form action="{{ action('UserController@saveUser') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12"><h4>Datos de Usuario</h4></div>

                  <div class="form-group col-md-6">
                    <label for="name">Nombre de usuario: </label>
                    <input class="form-control" type="text" name="name" value="<?php if(isset($user)) echo $user->name;?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">E-mail: </label>
                    <input class="form-control" type="email" name="email" value="<?php if(isset($user)) echo $user->email;?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="password">Contraseña: </label>
                    <input class="form-control" type="password" name="password" value="<?php if(isset($user)) echo $user->password;?>">
                  </div>

                  <input type="hidden" name="id" value="<?php if(isset($user)) echo $user->id;?>">
                  <div class="col-md-12"><button type="submit" class="btn btn-primary">Guardar</button></div>


            </form>


        </div>
        </div>
  </div>
</div>
@stop
