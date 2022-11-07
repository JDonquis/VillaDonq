<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../plantilla/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
        <div class="dropdown">
          <button class="btn btn-trasnparent dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </button>
          <ul class="dropdown-menu" style="left: -150px;">
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog mr-2" aria-hidden="true"></i> Configuración del perfil</a></li>
            <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a></li>
            
          </ul>
        </div>
     




    </ul>
</nav>