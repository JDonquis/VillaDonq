<form class="inscribe " show="{{old("DNI")?'active':'desactive'}}"  id="form-file" action="{{route('inscription_request')}}" method="POST" enctype="multipart/form-data">
  @csrf
            <div class="card_form slider opacity_effect_each">
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

                        <input type="hidden" name="year" value="5">

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

                     @php 

                        $ndocs = ceil(count($docs)/3);
                        $start = 0;
                     @endphp

                     @for($i = 0; $i<$ndocs;$i++)  
                                      
                        <fieldset class="each_slider_element file"> 
                        <legend>DOCUMENTOS {{$i+1}} </legend>
                       
                        @for($j = $start; $j<$start+3;$j++)

                            @php 
                            if(!isset($docs[$j]))
                                break;

                            @endphp
                        
                            
                            <label for="ins_{{$docs[$j]->name}}">{{ str_replace('_', ' ',$docs[$j]->name)}}: </label>
                            <input type="file" id="ins_{{$docs[$j]->name}}" name="{{$docs[$j]->name}}_up">
                        

                        @endfor

                        @php $start = $start + 3;   @endphp

                        </fieldset>
                     @endfor






                    <fieldset class="each_slider_element">
                        <legend>DATOS DEL REPRESENTANTE</legend>
                        <span>
                            <input type="text" id="ins_repre_nombre" name="rep_name" value="{{old("rep_name")}}">
                            <label for="ins_repre_nombre">Nombre completo: </label>
                        </span>
                        <span>
                            <input type="text" data-type="CI" id="ins_repre_DNI" name="rep_DNI" value="{{old("rep_DNI")}}">
                            <label for="ins_repre_DNI">DNI: </label>
                        </span>
                        <span>
                            <input type="tel" id="ins_repre_tel" name="rep_phone_number" value="{{old("rep_phone_number")}}">
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
