

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route("institution_profile")}}" class="nav-link">
            <p>
              Perfil de la institución
            </p>
          </a>

        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
             
              <p>
                Inscripciones
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route("requests")}}" class="nav-link">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Solicitudes</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
  