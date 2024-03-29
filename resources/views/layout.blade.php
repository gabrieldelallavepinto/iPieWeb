{{-- Panel de administración --}}

{{-- <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet"> --}}
<?php
$user = Auth::user();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="menuPrincipal">


    <a class="navbar-brand" href="{{ route('calendario') }}">
      <img src="{{asset('images/logo1.png')}}" class="img-fluid" alt="Responsive image" style="width: 55px;height: 55px;">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- menú --}}
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="menuIzquierda">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('calendario') }}">
            <i class="far fa-calendar-alt"></i>
            Calendario
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('anuncios') }}">
            <i class="far fa-envelope"></i>
            Tablón de anuncios
          </a>
        </li>

        {{--  solo para administradores  --}}
        @if(isset($user->tipo) && $user->tipo == 1)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#administracion">
              <i class="far fa-calendar-alt"></i>
              Administrador
              <i class="fas fa-angle-down"></i>
            </a>

            <ul class="collapse" id="administracion" style="padding:10px;">
              <div class="nav-item">
                <a class="nav-link" href="{{url('admin/users')}}">
                  <i class="far fa-calendar-alt"></i>
                  Usuarios
                </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" href="{{url('admin/clinicas')}}">
                    <i class="far fa-calendar-alt"></i>
                    Clinicas
                  </a>
                </div>
              <div class="nav-item">
                  <a class="nav-link" href="{{url('admin/tipocitas')}}">
                    <i class="far fa-calendar-alt"></i>
                    Tipo de Citas
                  </a>
                </div>
            </ul>

          </li>
        @endif
      </ul>

      <ul class="navbar-nav ml-auto">
        {{-- Mostrar Usuario --}}
        @if(isset($user->name))

          <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">
                <i class="far fa-address-card"></i>
                {{ $user->name }}
              </a>
            </li>
          </li>

        @endif

        {{-- cerrar sesión --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

            <i class="fas fa-sign-out-alt"></i>
            Cerrar Sesión
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>

      </ul>



    </div>
  </nav>
