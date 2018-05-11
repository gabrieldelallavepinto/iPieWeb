@extends('welcome')

<div class="container">
  <h3>Usuario</h3>
  <form action="{{ action('UserController@saveUser') }}" method="post">
    {{ csrf_field() }}
    <label for="name">Nombre de usuario: </label>
    <input type="text" name="name" value="<?php if(isset($user)) echo $user->name;?>"><br>
    <label for="email">E-mail: </label>
    <input type="email" name="email" value="<?php if(isset($user)) echo $user->email;?>"><br>
    <label for="password">Contraseña: </label>
    <input type="password" name="password" value="<?php if(isset($user)) echo $user->password;?>"><br>
    <input type="hidden" name="id" value="<?php if(isset($user)) echo $user->id;?>">

    <input type="submit"  value="Crear">
  </form>
  <a href="{{url('/admin/users')}}">Lista de Usuarios</a>
</div>
