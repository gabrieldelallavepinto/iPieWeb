{{-- Panel de administración --}}

{{-- <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet"> --}}


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="menuPrincipal">
    

    <a class="navbar-brand" href="{{ route('calendario') }}">
      <img src="images/logo1.png" class="img-fluid" alt="Responsive image" style="width: 55px;height: 55px;">
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
                  
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#administracion">
            <i class="far fa-calendar-alt"></i>
            Administrador
            <i class="fas fa-angle-down"></i>
          </a>
        
          <ul class="collapse" id="administracion" style="padding:10px;">
            <div class="nav-item">
              <a class="nav-link" href="">
                <i class="far fa-calendar-alt"></i>
                Usuario
              </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="">
                  <i class="far fa-calendar-alt"></i>
                  Usuario
                </a>
              </div>
          </ul>

        </li>

      </ul>

      <ul class="navbar-nav ml-auto">

        {{-- cerrar sesión --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('anuncios') }}">
            <i class="fas fa-sign-out-alt"></i>
            Cerrar Sesión
          </a>
        </li>
      </ul>
      


    </div>
  </nav>