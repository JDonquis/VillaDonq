<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("assets/css/security/login.css")}}">

    
    <title>VillaDonq | Login</title>
</head>  

<body>

    <a href="#" class="text-white">Volver a Home</a>

    @include("includes.loader")

    <div class="message {{$errors->any()?'response':''}}">
        
        <span>{{$errors->first()}}</span>

    </div>
     
    @include("includes.form_login")




    <script>
        document.querySelector(".close_btn").href = '../';
        document.querySelector(".login_form").style = 'transform: translateY(100vh) !important';
    </script>

    <script type="module" src="{{asset("assets/js/modules/login.js")}}"></script>


</body>

</html>