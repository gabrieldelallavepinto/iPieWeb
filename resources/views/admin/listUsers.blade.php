

<div class="container">
  @foreach($users as $user)
  <h3><a href="{{url('/admin/showUser/'.$user->id)}}"><?php echo $user->name ?></a></h3>
  @endforeach
</div>
