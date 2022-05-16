<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/pages/home.css">


    <title>VillaDonq</title>
</head>  

<body>
    
    <?php 
    $rute = 'views/';
        require_once "views/php_sections/_loader.php";
        require_once "views/php_sections/_form-login.php"; 
        require_once "views/php_sections/_nav.php"; 
     ?>
    
    <header class="home_header container">

         <div>
             <h1> La escuela del futuro ya llegó a prestarte la mejor educación.</h1>
             <span class="parent_btn_submit parent_inscribe_link"><a href="views/inscribe.php" class="link_to_inscribe btn_submit">Inscribete</a></span>
             
         </div>
 

        <div>
            <div class="circle_img_cont slider fade_effect zoom_effect auto">
                <div class=" slider_wrap">
                    <div class="each_slider_element active_default zoom_effect_act">
                        <img src="views/img/pexels-fauxels-3184432.jpg" alt="" srcset="" >
                    </div>
                    <div class="each_slider_element"> 
                        <img src="views/img/pexels-pixabay-207756.jpg" alt="" >
                    </div>
                    <div class="each_slider_element">
                        <img src="views/img/pexels-emily-ranquist-1205651.jpg" alt="" >
                    </div>
            
                </div>
            
            </div>
        </div>
    
    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>
    <script src="views/js/base.js"></script>
    <script src="views/js/loader.js"></script>
    <script src="views/js/login.js"></script>
    <script src="views/js/mySlider.js"></script>
    <script>
        
    </script>
</body>

</html>