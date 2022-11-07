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

            <div class="message {{$errors->any()?'response':''}} {{session("message")?'response':''}}">
        
                <span>
                    {{$errors->first()}}
                    {{session("message")}}
                </span>

            </div>

    @include("includes.form_login")
   

    <div class="cont_h1_and_form">
        <div class="h1_cont">
            <h1>Inscribete en VILLADONQ y recibe la mejor educación</h1>
        </div>

        @include("includes.form_inscription")
        
    </div>

</body>

<!-- jQuery -->
<script src="{{asset("assets/LTE/plugins/jquery/jquery.min.js")}}"></script>




<script>
    const date_input = document.querySelector("#ins_date_birth")
    const age_input = document.querySelector("#ins_edad")

    let fecha = new Date(),
        añoA = fecha.getFullYear(),
        mesA = fecha.getMonth() + 1,
        diaA = fecha.getDate();

    function calculateAge(_nacimiento) {
        let n = 0;
        let añoN, mesN, diaN;
        [añoN, mesN, diaN] = _nacimiento.split('-')

        n = +añoA - +añoN
        if ((mesA < mesN) || ((mesA == mesN) && (diaA < diaN))) n--

        return n
    }
    date_input.onchange = () => {
        if (date_input.value) {
            age_input.value = calculateAge(date_input.value)
            age_input.nextElementSibling.classList.add('focus_valid')
        }

    }
</script>




<script src="{{asset("assets/js/slider.js")}}"></script>

<script src="{{asset("assets/js/modules/inscribe.js")}}" type="module"></script>
</html>