@extends('welcome')

<div class="container">
  <h3>Usuario</h3>
  <form action="{{ action('UserController@store') }}" method="post">
    <label for="name">Nombre de usuario: </label>
    <input type="text" name="name" value=""><br>
    <label for="email">E-mail: </label>
    <input type="email" name="email" value=""><br>
    <label for="password">Contraseña: </label>
    <input type="password" name="password" value=""><br>
    <input type="submit"  value="Crear">
  </form>
</div>
