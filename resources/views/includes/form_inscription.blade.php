<form class="inscribe" id="form-file" action="{{route('inscription_request')}}" method="POST" enctype="multipart/form-data">
  @csrf
            <div class="card_form slider opacity_effect_each">
                <!-- <ul class="nav_slider">
                </ul>  -->
                <div class="progress_bar">
                    <div></div>
                </div>
                <div class="slider_wrap">
                <fieldset class="each_slider_element">
                        <legend>INSCRIBIRME EN:</legend>
                        <div class="d-grid">
                            <div id="">
                                {{-- <input type="radio" id="ins_type_new" name="type_inscri">
                                <label for="ins_type_new">Nuevo año escolar: </label> --}}
                                <div id="new_inscri_section">
                                    <label>Selecionar año</label>
                                    <select name="year" id="">
                                        @foreach($q_available as $q)
                                            <option value="{{$q->course->id}}">{{$q->course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                     {{--    <div class="d-grid">
                            <div>
                                <input type="radio" id="ins_type_middle" name="type_inscri">
                                <label for="ins_type_middle">Momento: </label>
                            </div>
                            
                        </div> --}}
               


                    </fieldset>

                    <fieldset class="each_slider_element">
                        <legend>DATOS PERSONALES</legend>
                        <div class="d-grid">
                            <span>
                                <input type="text" id="ins_nombres" name="name" value="{{old("name")}}">
                                <label for="ins_nombres">Nombres: </label>
                            </span>
                            <span>
                                <input type="text" id="ins_apellidos" name="last_name" value="{{old("last_name")}}">
                                <label for="ins_apellidos">Apellidos: </label>
                            </span>
                        </div>
                        <div class="d-grid">
                            <span>
                                <input type="date" id="ins_date_birth" name="date_birth" value="{{old("date_birth")}}">
                                <label for="ins_date_birth">Fecha de nacimiento:</label>
                            </span>
                            <input type="hidden" id="ins_edad" readonly name="age" value="{{old("age")}}"> 
                            <span>
                                <input type="gmail" name="email" id="ins_correo" value="{{old("email")}}">
                                <label for="ins_correo">Correo: </label>
                            </span>
                        </div>
                        <div class="d-grid">
                            <span>
                                <input type="text" data-type="CI" id="ins_DNI" title="Debe escribir una letra 'V' seguida de 8 números" name="DNI" value="{{old("DNI")}}">
                                <label for="ins_DNI">DNI: </label>
                            </span>
                            <span>
                                <input type="tel" id="ins_telefono" name="phone_number" value="{{old("phone_number")}}">
                                <label for="ins_telefono">Telefono: </label>
                            </span>
                        </div>


                    </fieldset>

                    <fieldset class="each_slider_element">
                        <legend>DIRECCIÓN DE HOGAR</legend>
                        <span>
                            <input type="text" id="ins_estado" name="state" value="{{old("state")}}">
                            <label for="ins_estado">Estado: </label>
                        </span>
                        <div class="d-grid">
                            <span>
                                <input type="text" id="ins_ciudad" name="city" value="{{old("city")}}">
                                <label for="ins_ciudad">Ciudad: </label>
                            </span>
                            
                        </div>

                        <label for="direccion_detallada">Dirección especifica</label>
                        <textarea name="address" id="direccion_detallada" cols="30" rows="5" style="max-height: 100px;">{{old("address")}}</textarea>

                    </fieldset>

                    <fieldset class="each_slider_element file">
                        <legend>DOCUMENTOS PERSONALES</legend>
                        <label for="ins_foto">Foto: </label>
                        <input type="file" id="ins_foto" name="photo_up">
                        <label for="ins_partida_de_nacimiento">Partida de nacimiento: </label>
                        <input type="file" id="ins_partida_de_nacimiento" name="cer_birth_up">

                    </fieldset>

                    <fieldset class="each_slider_element file">
                        <legend>DOCUMENTOS ACADEMICOS</legend>
                        <label for="ins_boleta">Boleta: </label>
                        <input type="file" id="ins_boleta" name="report_card_up">
                        <label for="ins_notas">Notas: </label>
                        <input type="file" id="ins_notas" name="cer_notes_up">
                        <label for="ins_buena_conducta">Constancia de buena conducta</label>
                        <input type="file" name="cer_conduct_up" id="ins_buena_conducta">

                    </fieldset>

                    <fieldset class="each_slider_element">
                        <legend>DATOS DEL REPRESENTANTE</legend>
                        <span>
                            <input type="text" id="ins_repre_nombre" name="rep_name">
                            <label for="ins_repre_nombre">Nombre completo: </label>
                        </span>
                        <span>
                            <input type="text" data-type="CI" id="ins_repre_DNI" name="rep_DNI">
                            <label for="ins_repre_DNI">DNI: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre_tel" name="rep_phone_number">
                            <label for="ins_repre_tel">Telefono: </label>

                        </span>
                        <span class="parent_btn_submit"><input type="submit" id="b_form" name="new_request" value="INSCRIBIR" class="inscribirse btn_submit"></span>

                    </fieldset>
                </div>

                <div class="arrow_buttons">
                    <button class="prev" type="button" title="Volver"> ← </button>
                    <button class="next" type="button">Siguiente</button>
                </div>
            </div>
        </form>