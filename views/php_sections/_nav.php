

<nav class="main_nav">
        <div class="container">  

            <a href="index.php">
                <picture class="logo">
                    <source media="(min-width: 700px)" srcset="<?php echo $rute ?>img/logo_small.png">
                    <img src="<?php echo $rute ?>img/logo.png" alt="">
                </picture>
            </a>
            <div class="nav-section">
                <button class="entrar-btn">Entrar</button>
                <button class="trigger_nav">
                    <svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class='path-1' d="M0.5 2C10.9 2 27.1667 2 34 2" stroke-width="3" />
                        <path class='path-2' d="M0 13C10.4 13 26.6667 13 33.5 13" stroke-width="3" />
                        <path class='path-3' d="M0 24C10.4 24 26.6667 24 33.5 24" stroke-width="3" />
                    </svg>
                </button>
            </div>
            <ul class="nav_content">
                <li><span>navigation</span></li>
                <li><a href="#">Home</a></li>
                <li><a href="blog/index.html">Blog</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Lorem</a></li>
            </ul>
        </div>

    </nav>