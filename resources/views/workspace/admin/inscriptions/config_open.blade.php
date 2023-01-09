<section class="container-fluid">
                    <h2 class="h3">Periodo de inscripción nuevo año escolar 2023</h2>

                        <form class="d-md-flex " id="date-form">
                        <div class="form-group" >
                            <label>Inicio:
                                <input value="{{$school_lapse->inscription_lapse->start}}" max="{{$school_lapse->inscription_lapse->end}}" class="start form-control" type="date" name="start">
                            </label>
                        </div>
                        <div class="form-group ml-md-3">
                            <label>Fin:
                                <input disabled="true" min="{{$school_lapse->inscription_lapse->start}}" value="{{$school_lapse->inscription_lapse->end}}" max="" class="end form-control" type="date" name="end">
                            </label>
                        </div>
                        <span class="parent_btn_submit ">
                        <input title='Ctrl + s' type="submit" name="save-date" value="Guardar fecha" class="btn_submit mt-4 ml-3 d-none p-2" id="date_btn"></span>
                    </form>


<!-- start cupos *********************************************************************************************************************************************************************************************** -->
<form class="row">
    <div class="col-md-8">
        <div class="card">

              <div class="card-header">
                <h2 class="h4 d-inline">Cupos </h2>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class=" table table-head-fixed text-nowrap table-bordered cupos">
                  <thead>
                    <tr>
                      <th style="">Año escolar</th>
                      <th>Asignados</th>
                      <th class="color-2">Aceptados</th>
                      <th style="" class="text-right">Restantes</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @for($i = 0; $i < 5; $i++)
                    
                     <tr>
                      <td>{{$i+1}}</td>
                      <td class="position-relative ">  
                        <!-- min == numero de aceptados -->
                      <input type="number" min="{{$school_lapse->inscription_lapse->quotas[$i]->accepted}}" class="asignados w-100 h-100 position-absolute top-0 left-0 pl-3 pb-3"  name="assigned{{$i+1}}" value="{{$school_lapse->inscription_lapse->quotas[$i]->assigned}}">
                      </td>
                      <td colspan="2">
                        <div class="progress progress-xs">
                            <!-- the style=width: getPercent(nro_asignados, nro_aceptados) -->
                          <div class="progress-bar bg-2" style="width: 85%"></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="aceptados mt-2 color-2 font-weight-bold">{{$school_lapse->inscription_lapse->quotas[0]->accepted}}</span>
                        <input  min="0" class="restantes r1 border text-right rounded mt-1 col-3 input-sm" type="number" name="remaining{{$i+1}}" value="{{$school_lapse->inscription_lapse->quotas[$i]->remaining}}" >
                        </div>
                      </td>
                    </tr>


                    @endfor
                    
                    
                   
                  </tbody>

                </table>
                <span class="parent_btn_submit">
                <input title='Ctrl + s' type="submit" name="save-quotas" value="Guardar cupos" class="btn_submit d-none mt-2" id="cupos_btn"></span>
                                        
              </div>
              <!-- /.card-body -->
        </div>
    </div>
</form>
            


<!--start docs *****************************************************************************************************************************************************************************************+ -->
             <form class="row  row_table_plan" id="docs-form">
                        <div class="col-md-10">
                            <div class="card parent_pdf">
                                <div class="card-header">
                                    <div class="form-group float-left mt-2 move_hist_btns">
                                        <button type="button" onclick="goBack()" title="revertir cambio ( ctrl + z )"
                                            class="bg-transparent disabled fa-solid history_arrows past fa-arrow-rotate-left"></button>
                                        <button type="button" onclick="goNext()" title="volver al cambio ( ctrl + y )"
                                            class="bg-transparent fa-solid history_arrows future fa-arrow-rotate-right disabled ml-2 mr-4"></button>
                                    </div>
                                    <h2 class="h4 d-inline">Documentos </h2>
                                    <div class="card-tools ">
                                        <span class="parent_btn_submit">
                                        <input title='Ctrl + s' type="submit" name="save-docs" value="GUARDAR" class="btn_submit d-none mt-0" id="docs_btn"></span>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="max-height: 700px;">
                                    <table id="table_docs" class=" table table-head-fixed text-nowrap table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th_unidad"> # </th>
                                                <th>Nombre del documento</th>
                                                <th>Solicitado</th>
                                                <th>Obligatorio</th>
                                                <th class="th_valor">Eliminar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{var_dump($docs)}} --}}

                                            @php $c = 0; @endphp
                                            @foreach($docs as $doc)
                                                @php $c++; @endphp
                                            <tr id="tr{{$c}}">
                                                <td class="text-bold td_unidad">
                                                    {{$c}}
                                                </td>
                                                <td class="p-0 each_cell"><textarea
                                                        name="tema1">{{ str_replace("_"," ",$doc->name) }}</textarea></td>
                                                <td class="text-center align-middle each_cell">
                                                    <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="requested{{$c}}">
                                                        <label class="custom-control-label" for="requested{{$c}}"></label>
                                                    </div>
                                                    </div>
                                                </td>

                                                <td class="text-center align-middle each_cell">
                                                    <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="required-{{$c+1}}">
                                                        <label class="custom-control-label" for="required-{{$c+1}}"></label>
                                                    </div>
                                                    </div>
                                                </td>
                                                
                                                <td class="borrar text-center"><i class="fa-solid fa-xmark"
                                                        id="br{{$c}}"></i></td>

                                            </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="btn_more" title="Agregar nueva  (ctrl + enter)">
                                                    <i class="fa-solid fa-plus"></i> Nuevo documento
                                                </td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </form>
            


</section>
