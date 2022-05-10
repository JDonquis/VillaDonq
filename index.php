<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="views/css/main.css">


    <title>VillaDonq</title>
</head>

<body>
    
    <?php require_once "views/form-login.php"; ?>
    <nav class="main_nav">
        <div class="container">

            <a href="index.php">
                <picture class="logo">
                    <source media="(min-width: 700px)" srcset="views/img/big_logo.png">
                    <img src="views/img/small_logo.png" alt="">
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
    <header class="home_header">

        <!-- Slider main container -->
        <div class="swiper home_slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="each_slide">
                        <img data-src="img/javier-trueba-iQPr1XkF5F0-unsplash.jpg" alt="" class="swiper-lazy">
                        <p>La universidad que te ofrece la mejor calidad educativa</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="each_slide">
                        <img data-src="img/pexels-emily-ranquist-1205651.jpg" alt="" class="swiper-lazy">
                        <p>Lorem ipsum dolor sit amet consectetur, Quaerat eligendi tempore architecto.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="each_slide">
                        <img data-src="img/pexels-fauxels-3184432.jpg" alt="" class="swiper-lazy">
                        <p> sit amet consecteing elit. Quaerat eligendi tempore architecto.</p>
                    </div>

                </div>
                <div class="swiper-slide">

                    <div class="each_slide">
                        <img data-src="img/pexels-pixabay-207756.jpg" alt="" class="swiper-lazy">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat eligendi .</p>
                    </div>
                </div>

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev move"></div>
            <div class="swiper-button-next move"></div>


        </div>
    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>
    <script src="views/js/base.js"></script>
    <script src="views/js/loader.js"></script>
    <script src="views/js/login.js"></script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> 

    <!-- <script src="js/carousel.js"></script> -->
</body>

</html>