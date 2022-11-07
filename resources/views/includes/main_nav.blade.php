<nav class="main_nav">
        <div class="container">  

            <a href="{{route("welcome")}}" class="transition_link">
                <picture class="logo transition_link">
                    <source media="(min-width: 700px)" srcset="{{asset("assets/img/logo_small.png")}}" class="transition_link">
                    <img src="{{asset("assets/img/Logo.png")}}" alt="" class="transition_link">
                </picture>
            </a>
            <div class="nav-section">
                @if(!session()->has('id_user'))
                <button class="entrar-btn trigger_modal" data-modal="login_form">Entrar</button>
                <button class="trigger_nav trigger_modal" data-modal="nav_content">
                    <svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class='path-1' d="M0.5 2C10.9 2 27.1667 2 34 2" stroke-width="3" />
                        <path class='path-2' d="M0 13C10.4 13 26.6667 13 33.5 13" stroke-width="3" />
                        <path class='path-3' d="M0 24C10.4 24 26.6667 24 33.5 24" stroke-width="3" />
                    </svg>
                </button>
                @else
                <a href="{{route('workspace')}}">Workspace</a>
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