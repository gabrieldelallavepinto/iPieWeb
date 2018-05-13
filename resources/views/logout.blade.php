<div class="container">
  <form action="{{ action('Auth\LoginController@logout') }}" method="post">
    {{ csrf_field() }}
    <label for="email">E-mail: </label><br>
    <input type="email" name="email" value=""><br>
    <label for="password">Contraseña: </label><br>
    <input type="password" name="password" value=""><br>
    <input type="submit" value="Entrar">
  </form>
</div>
