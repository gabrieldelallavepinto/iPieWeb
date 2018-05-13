

<div class="container">
  @foreach($users as $user)
  <h3>
    <a href="{{url('/admin/showUser/'.$user->id)}}"><?php echo $user->name ?></a>
    <a href="{{url('/admin/deleteUser/'.$user->id)}}">Borrar</a>
   </h3>
  @endforeach
  <a href="{{url('/admin/formUser')}}">Añadir Usuario</a>
</div>
