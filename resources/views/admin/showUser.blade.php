<div class="container">
  <h3>Usuario: <?php echo $user->name; ?></h3>
  <h4>E-mail: <?php echo $user->email; ?></h4>
  <a href="{{url('/admin/formUser/'.$user->id)}}">Editar Usuario</a>
  <a href="{{url('/admin/users')}}">Lista de Usuarios</a>
</div>
