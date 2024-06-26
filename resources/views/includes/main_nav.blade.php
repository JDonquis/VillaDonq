

    <nav class="main_nav">
        <div class="container">  

            <a href="{{route("welcome")}}" class="transition_link link_to_home">
                <picture class="logo transition_link">
                    <source media="(min-width: 700px)" srcset="{{asset("assets/img/logo_oficial.svg")}}" class="transition_link">
                    <img src="{{asset("assets/img/logo_oficial.svg")}}" alt="" class=" transition_link">
                </picture>
                <span class="text_logo">VILLADONQ</span>
            </a>
            <div class="nav-section">
                @if(!session()->has('id_user'))
                <button class="entrar-btn trigger_modal color-white " data-modal="login_form">Entrar</button>
{{--                 <button class="trigger_nav trigger_modal" data-modal="nav_content">
                    <svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class='path-1' d="M0.5 2C10.9 2 27.1667 2 34 2" stroke-width="3" />
                        <path class='path-2' d="M0 13C10.4 13 26.6667 13 33.5 13" stroke-width="3" />
                        <path class='path-3' d="M0 24C10.4 24 26.6667 24 33.5 24" stroke-width="3" />
                    </svg>
                </button> --}}
                <button class="hamburger hamburger--collapse trigger_nav trigger_modal" id="btn-hamburger-main" type="button" data-modal="nav_content">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </button>

                @else
                <div class="dropdown">
                  <button class="btn btn-trasnparent dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user h4"></i>
                  </button>
                  <ul class="dropdown-menu" style="left: -350%;">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-cog mr-2 text-dark " aria-hidden="true"></i> Configuración del perfil</a></li>
                    <li><a class="dropdown-item" href="{{route('workspace')}}">Workspace</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a></li>
                  </ul>
                </div>
                
                @endif

            </div>
            <div class="nav_content modal">
                <ul>
                    <li><span>Navigation</span></li>
                    <li><a class="nav_links" href="#">Home</a></li>
                    <li><a class="nav_links" href="#">Blog</a></li>
                    <li><a class="nav_links" href="#">Contacto</a></li>
                    <li><a class="nav_links" href="#">Lorem</a></li>
                </ul>
            </div>
        </div>

    </nav>

