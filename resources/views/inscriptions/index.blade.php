<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset("assets/css/inscription/index.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/inscription/inscription.css")}}">



    <title>Inscrirbirse</title>
</head>

<body>

    @include("includes.loader")
    @include("includes.main_nav")

          @include('includes.message_error')


    @include("includes.form_login")
   

    <div class="cont_h1_and_form">
        <div class="h1_cont">
            <h1>Inscribete en VILLADONQ y recibe la mejor educación</h1>
        </div>

        
            <form class="inscribe {{ old("DNI")?'d-none':''}}" id="consult-form">
            <div class="card_form" >
                <fieldset>
                    <legend>INGRESA LOS SIGUIENTES DATOS PARA COMENZAR LA INSCRIPCIÓN:</legend>
                        
                            <span>
                                <input type="text" data-type="CI" id="ins_ci" pattern="[A-Za-z]{1}[0-9]{8}" title="Debe escribir una letra 'V' seguida de 8 números" name="ins_ci">
                                <label for="ins_ci">DNI: </label>
                            </span>
                         
                        <label for="ins_type_new">Selecciona un cupo disponible: </label>
                            <div id="new_inscri_section">
                             <select name="year" id="ins-year">
                                        @foreach($q_available as $q)
                                            <option value="{{$q->course->id}}">{{$q->course->name}}</option>
                                        @endforeach
                            </select>
                            </div>
                
                <div class="consult-message"></div>

                <button class="btn_submit mt-0" type="button" id="btn-consult">Siguiente</button>
                </fieldset>

            </div>
        </form>      

        @include("includes.form_inscription")
        
    </div>

</body>

<!-- jQuery -->
<script src="{{asset("assets/LTE/plugins/jquery/jquery.min.js")}}"></script>

<script src="{{asset("assets/js/modules/inscribe.js")}}" type="module"></script>

<script src="{{asset("assets/js/slider.js")}}"></script>



</html>