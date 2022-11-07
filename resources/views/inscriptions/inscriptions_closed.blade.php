<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{asset("assets/css/inscription/index.css")}}">
  
    <title>Inscrirbirse | Cerrado</title>
</head>

<body>

    @include("includes.loader")

{{--             <div class="message {{$errors->any()?'response':''}} {{session("message")?'response':''}}">
        
                <span>
                    {{$errors->first()}}
                    {{session("message")}}
                </span>

            </div> --}}


            <div class="box-message-inscription-closed">
                <h1 class="">{{$message}}</h1>
                <a href="/" class="btn btn-outline-info mt-5">Volver a Home</a>
            </div>


</body>

<!-- jQuery -->
<script src="{{asset("assets/LTE/plugins/jquery/jquery.min.js")}}"></script>

<script src="{{asset("assets/js/modules/inscribe.js")}}" type="module"></script>
</html>