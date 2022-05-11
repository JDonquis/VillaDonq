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
    
    <?php 
    $rute = 'views/';
        require_once "views/php_sections/_loader.php";
        require_once "views/php_sections/_form-login.php"; 
        require_once "views/php_sections/_nav.php"; 
     ?>
    
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

    <!-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>  -->

    <!-- <script src="js/carousel.js"></script> -->
</body>

</html>