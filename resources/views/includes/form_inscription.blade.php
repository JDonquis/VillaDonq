<form class="inscribe modal_form" show="{{old("DNI")?'active':'active'}}" id="form-file" enctype="multipart/form-data">
    <a class="close_btn_modal trigger_modal" data-modal="inscribe" type="menu">
        <svg width="37" height="31" viewBox="0 0 37 31" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.62216 29.6726L31 2.00003" stroke-width="3" />
            <path d="M31.5 29.5L5.34254 2.51347" stroke-width="3" />
        </svg>
        <span class="color-1 mt-1">ESC</span>
    </a>
    @csrf
    <div class="card_form slider opacity_effect_each">
        <!-- <ul class="nav_slider">
                </ul>  -->
        <div class="progress_bar">
            <div></div>
        </div>
        <div class="slider_wrap">
            <fieldset class="each_slider_element">
                <legend>DATOS DEL ESTUDIANTE</legend>
                <div class="d-grid">
                    <span>
                        <input type="text" id="ins_nombres" name="student_name" value="{{old("name")}}">
                        <label for="ins_nombres">Nombres: </label>
                    </span>
                    <span>
                        <input type="text" id="ins_apellidos" name="student_last_name" value="{{old("last_name")}}">
                        <label for="ins_apellidos">Apellidos: </label>
                    </span>
                </div>
                <div class="d-grid">
                    <span>
                        <input type="date" id="ins_date_birth" name="student_date_birth" value="{{old("date_birth")}}">
                        <label for="ins_date_birth">Fecha de nacimiento:</label>
                    </span>
                    <span>
                        <input type="gmail" name="student_email" id="ins_correo" value="{{old("email")}}">
                        <label for="ins_correo">Correo: </label>
                    </span>
                </div>

                <div class="d-grid">
                    <span>
                        <input type="text" data-type="CI" id="ins_DNI" pattern="[0-9]{8}" name="student_DNI" value="{{old("DNI")}}" >
                        <label for="ins_DNI">C.I: </label>
                    </span>
                    <span>
                        <input type="tel" id="ins_telefono" name="student_phone_number" value="{{old("phone_number")}}">
                        <label for="ins_telefono">Telefono: </label>
                    </span>
                </div>
                <div class="row w-full mb-3">
                    <div class="col-4">
                        <select name="course_id" id="ins-year">
                            <option class="h6" value="2">1 año</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select name="section_id" id="ins-year">
                            <option class="h6" value="2">Sección A</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select name="student_sex" id="ins-year">
                            <option class="h6" value="Masculino">Masculino</option>
                            <option class="h6" value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>
                <label for="previousSchool">Colegio de procedencia</label>
                <textarea name="student_previous_school" id="previousSchool" cols="30" rows="2" style="max-height: 100px;">{{old("previousSchool")}}</textarea>
                <input type="hidden" name="year" value="5">

            </fieldset>

            <fieldset class="each_slider_element">
                <legend>DIRECCIÓN DE HOGAR</legend>
                <span>
                    <input type="text" id="ins_estado" name="state" value="{{old("state")}}">
                    <label for="ins_estado">Estado: </label>
                </span>
                <span>
                    <input type="text" id="ins_ciudad" name="city" value="{{old("city")}}">
                    <label for="ins_ciudad">Ciudad: </label>
                </span>


                <label for="direccion_detallada">Dirección especifica</label>
                <textarea name="address" id="direccion_detallada" cols="30" rows="5" style="max-height: 100px;">{{old("address")}}</textarea>

            </fieldset>

            {{-- @php 

                         $ndocs = ceil(count($docs)/3);
                        $start = 0;
                     @endphp

                     @for($i = 0; $i<$ndocs;$i++)  
                                      
                        <fieldset class="each_slider_element file"> 
                        <legend>DOCUMENTOS {{$i+1}} </legend>

            @for($j = $start; $j<$start+3;$j++) @php if(!isset($docs[$j])) break; @endphp <label for="ins_{{$docs[$j]->name}}">{{ str_replace('_', ' ',$docs[$j]->name)}}: </label>
                <input type="file" id="ins_{{$docs[$j]->name}}" name="{{$docs[$j]->name}}_up">


                @endfor

                @php $start = $start + 3; @endphp

                </fieldset>
                @endfor
                --}}





                <fieldset class="each_slider_element">
                    <legend>REPRESENTANTE LEGAL</legend>
                    <div class="d-grid">

                        <span>
                            <input type="text" id="ins_repre_nombre" name="rep_name">
                            <label for="ins_repre_nombre">Nombres: </label>
                        </span>
                        <span>
                            <input type="text" id="ins_repre_apellido" name="rep_last_name">
                            <label for="ins_repre_apellido">Apellidos: </label>
                        </span>
                    </div>
                    <div class="d-grid">

                        <span>
                            <input type="text" data-type="CI" id="ins_repre_DNI" name="rep_DNI" value="{{old("rep_DNI")}}">
                            <label for="ins_repre_DNI">C.I: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre_tel" name="rep_phone_number" value="{{old("rep_phone_number")}}">
                            <label for="ins_repre_tel">Telefono: </label>

                        </span>
                    </div>
                    <div class="d-grid">
                        <span>
                            <input type="email" id="ins_repre_email" name="rep_email" value="{{old("rep_email")}}">
                            <label for="ins_repre_tel">Correo: </label>

                        </span>
                        <span>
                            <input type="text" id="job" name="rep_profession" value="{{old("job")}}">
                            <label for="job">Profesión: </label>
                        </span>

                    </div>
                    <label for="work_location">Lugar de trabajo</label>
                    <textarea class="mb-4" name="rep_workplace" id="work_location" cols="30" rows="2" style="max-height: 100px;">{{old("work_location")}}</textarea>

                    <!-- <span class="parent_btn_submit"><input type="submit" id="b_form" name="new_request" value="INSCRIBIR" class="inscribirse btn_submit"></span> -->

                </fieldset>

                <fieldset class="each_slider_element">
                    <legend>2do REPRESENTANTE </legend>
                    <div class="d-grid">

                        <span>
                            <input type="text" id="ins_repre2_nombre" name="second_rep_name">
                            <label for="ins_repre2_nombre">Nombres: </label>
                        </span>
                        <span>
                            <input type="text" id="ins_repre2_apellido" name="second_rep_last_name">
                            <label for="ins_repre2_apellido">Apellidos: </label>
                        </span>
                    </div>
                    <div class="d-grid">

                        <span>
                            <input type="text" data-type="CI" id="ins_repre2_DNI" name="second_rep_DNI" value="{{old("second_rep_DNI")}}">
                            <label for="ins_repre2_DNI">C.I: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre2_tel" name="second_rep_phone_number" value="{{old("second_rep_phone_number")}}">
                            <label for="ins_repre2_tel">Telefono: </label>

                        </span>
                    </div>
                    <div class="d-grid">
                        <span>
                            <input type="email" id="ins_repre2_email" name="second_rep_email" value="{{old("second_rep_email")}}">
                            <label for="ins_repre2_tel">Correo: </label>

                        </span>
                        <span>
                            <input type="text" id="second_rep_profession" name="second_rep_profession" value="{{old("second_rep_profession")}}">
                            <label for="second_rep_profession">Profesión: </label>
                        </span>

                    </div>
                    <label for="work_location">Lugar de trabajo</label>
                    <textarea class="mb-4" name="second_rep_workplace" id="work_location" cols="30" rows="2" style="max-height: 100px;">{{old("work_location")}}</textarea>

                    <span class="parent_btn_submit"><input type="submit" id="b_form" name="new_request" value="INSCRIBIR" class="inscribirse btn_submit"></span>

                </fieldset>
        </div>

        <div class="arrow_buttons">
            <button class="prev" type="button" title="Volver"> ← </button>
            <button class="next" type="button">Siguiente</button>
        </div>
    </div>
</form>