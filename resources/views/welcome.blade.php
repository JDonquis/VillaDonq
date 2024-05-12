
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(session()->has('id_user'))
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
    @endif
    <link rel="stylesheet" href="{{asset("assets/LTE/plugins/fontawesome-free/css/all.css")}}">
    <link rel="stylesheet" href="{{asset("assets/hamburger_css/hamburger.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/welcome.css")}}">
	<link rel="stylesheet" href="{{ asset('assets/css/workspace/general.css') }}">

    <title>VillaDonq</title>
</head>  


<body>


    @include("includes.loader")
     
    @include("includes.form_login")
<div class="gradient_blue">
    @include("includes.main_nav")

    <header class="home_header container">

    <div>
       <h1 > La escuela del <span>futuro</span> ya llegó a prestarte la mejor <span>educación.</span> </h1>         
       <span class="parent_btn_submit parent_inscribe_link"><a href="{{route("inscription")}}" class="link_to_inscribe btn_submit transition_link">Inscribete</a></span>             
     </div>


        <div>
            <div class="circle_img_cont slider fade_effect zoom_effect auto ">
                <div class=" slider_wrap">
                    <div class="each_slider_element active_default zoom_effect_act">
                        <img src="{{asset("assets/img/pexels-fauxels-3184432.webp")}}" alt="" srcset="" >
                    </div>
                    <div class="each_slider_element"> 
                        <img src="{{asset("assets/img/pexels-pixabay-207756.webp")}}" alt="" >
                    </div>
                    <div class="each_slider_element">
                        <img src="{{asset("assets/img/pexels-emily-ranquist-1205651.webp")}}" alt="" >
                    </div>
                </div>
                
                

            </div> 
        </div>
    
    </header>
</div>

    <script type="module" src="{{asset("assets/js/modules/index.js")}}"></script>
    <script src="{{asset("assets/js/slider.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>


</body>

</html>