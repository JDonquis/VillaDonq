<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pages/css_register.css">
    <title>Inscrirbirse</title>
</head>
 
<body>
    <?php 
    $rute = '';
        require_once('php_sections/_loader.php');
        require_once('php_sections/_nav.php'); 
        require_once('php_sections/_form-login.php');
        
     ?>

    <div class="cont_h1_and_form">
        <div class="h1_cont">
            <h1>Inscribete en VILLADONQ y recibe la mejor educación</h1>
        </div>

            <form class="inscribe" action="../controller/request_controller.php" method="POST">

            <div class="card_form slider" id='up'>
                <!-- <ul class="nav_slider">
                </ul>  -->
                <div class="progress_bar">
                    <div></div>
                </div>
                <div class="slider_wrap">
                    <fieldset class="each_slider_element"> 
                        <legend>DATOS PERSONALES</legend>
                        <div class="d-grid">    
                            <span>
                                <input type="text" id="ins_nombres" name="" >
                                <label for="ins_nombres">Nombres: </label>
                            </span>
                            <span>
                                <input type="text" id="ins_apellidos" >
                                <label for="ins_apellidos">Apellidos: </label>
                            </span>
                        </div>
                        <div class="d-grid">    
                            <span>
                                <input type="date" id="ins_date_birth" >
                                <label for="ins_date_birth">Fecha de nacimiento: </label>
                            </span>
                            <span>
                                <input type="text" id="ins_edad" disabled >
                                <label for="ins_date_birth">Edad:</label>
                            </span>
                        </div>
                        <div class="d-grid"> 
                            <span>
                                <input type="text" id="ins_DNI" pattern="[A-Za-z]{1}[0-9]{8}"  title="Debe escribir una letra seguida de 8 números" >
                                <label for="ins_DNI">DNI: </label>
                            </span>
                            <span>
                                <input type="tel" id="ins_telefono" >
                                <label for="ins_telefono">Telefono: </label>
                            </span>
                        </div>
                        <span>
                            <input type="gmail" name="" id="ins_correo" >
                            <label for="ins_correo">Correo: </label>
                        </span>
                        <div class="arrow_buttons">
                            <button class="prev" type="button" title="Volver" href="#up"> ← </button>
                            <button class="next" type="button">Siguiente</button>
                        </div>
                    </fieldset>

                    <fieldset class="each_slider_element">
                        <legend>DIRECCIÓN DE HOGAR</legend>
                        <span>
                            <input type="text" id="ins_estado" >
                            <label for="ins_estado">Estado: </label>
                        </span>
                        <div class="d-grid">
                            <span>
                                <input type="text" id="ins_ciudad" >
                                <label for="ins_ciudad">Ciudad: </label>
                            </span>
                            <span>
                                <input type="text" id="ins_codigo_postal" >
                                <label for="ins_codigo_postal">Codigo postal (opciona): </label>
                            </span>
                        </div>
                    
                            <label for="direccion_detallada">Dirección especifica</label>
                            <textarea name="" id="direccion_detallada" cols="30" rows="5"></textarea>
                        <div class="arrow_buttons">
                            <button class="prev" type="button" title="Volver"> ← </button>
                            <button class="next" type="button">Siguiente</button>
                        </div>
                    </fieldset>

                    <fieldset class="each_slider_element file">
                        <legend>DOCUMENTOS PERSONALES</legend>
                        <label for="ins_foto">Foto: </label>
                        <input type="file" id="ins_foto" >
                        <label for="ins_partida_de_nacimiento">Partida de nacimiento: </label>
                        <input type="file" id="ins_partida_de_nacimiento" >
                        <div class="arrow_buttons">
                            <button class="prev" type="button" title="Volver"> ← </button>
                            <button class="next" type="button">Siguiente</button>
                        </div>
                    </fieldset>

                    <fieldset class="each_slider_element file">
                        <legend>DOCUMENTOS ACADEMICOS</legend>
                        <label for="ins_boleta">Boleta: </label>
                        <input type="file" id="ins_boleta" >
                        <label for="ins_notas">Notas: </label>
                        <input type="file" id="ins_notas" >
                        <label for="ins_buena_conducta">Constancia de buena conducta</label>
                        <input type="file" name="" id="ins_buena_conducta">
                        <div class="arrow_buttons">
                            <button class="prev" type="button" title="Volver"> ← </button>
                            <button class="next" type="button">Siguiente</button>
                        </div>
                    </fieldset>

                    <fieldset class="each_slider_element">
                        <legend>DATOS DEL REPRESENTANTE</legend>
                        <span>
                            <input type="text" id="ins_repre_nombre" >
                            <label for="ins_repre_nombre">Nombre completo: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre_DNI" >
                            <label for="ins_repre_DNI">DNI: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre_tel">
                            <label for="ins_repre_tel">Telefono: </label>
                        </span>
                        <span class="parent_btn_submit"><input type="submit" name="new_request" value="INSCRIBIR" class="inscribirse btn_submit"></span>
                        <div class="arrow_buttons">
                            <button class="prev" type="button" title="Volver" > ← </button>
                            <button class="next" type="button">Siguiente</button>
                        </div>
                    </fieldset>
                </div>
        
                
            </div>
        </form>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>
<script src="js/login.js"></script>
<script src="js/base.js"></script>
<script src="js/loader.js"></script>
<script>
    opacity_effect_each = true
    document.querySelectorAll(".card_form input").forEach(input => {
        if (input.type !== 'file' && input.type !== 'submit') {
            input.onfocus = () =>{ 
                if (input.id === 'ins_date_birth') {
                    input.classList.add('focus_valid')
                }
                if (input.id === 'ins_DNI') {
                    input.value = 'V'
                }
                input.nextElementSibling.classList.add('focus_valid')
                
            }
            input.onblur = () => {
                if (input.id == 'ins_date_birth') {
                    !input.value ?  input.classList.remove('focus_valid'): ''
                }
                !input.value ? input.nextElementSibling.classList.remove('focus_valid') : ''
            }
        } else {
            input.onchange = () => input.style.color = '#21E6C1'
        }
    })
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
    date_input.onchange= () => {
        if (date_input.value) {
            age_input.value = calculateAge(date_input.value)
            age_input.nextElementSibling.classList.add('focus_valid')
        }
        
    }
    function goUp() {
        console.log('ay');
        const form_ins = document.querySelector("form.inscribe")
        form_ins.scrollIntoView(true)
    }
    
</script>
<script src="js/mySlider.js"></script>
    

</html>