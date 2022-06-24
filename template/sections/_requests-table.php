  <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Solicitudes de Incripcion</h3>

                <div class="w-50 text-center">
                  <button class="btn btn-primary filter" id="filter-no-check">Sin Revisar</button>
                  <button class="btn btn-primary filter" id="filter-accept">Aceptados</button>
                  <button class="btn btn-primary filter" id="filter-rejected">Rechazados</button>
                </div>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Estado</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>DNI</th>
<!--                       <th>Direccion</th>
                      <th>Edad</th>
                      <th>Acta de nacimiento</th>
                      <th>Boleta</th>
                      <th>Notas Certificadas</th>
                      <th>Certificado Buena Conducta</th>
                      <th>Foto</th>
                      <th>Nombre Representante</th>
                      <th>Numero de Representante</th>
                      <th>Fecha de Nacimiento</th> -->
                    </tr>
                  </thead>
                  <tbody id="table-request">
                   
                    <?php foreach ($requests as $request){ ?>
                      
                    <tr> 
                      
                      <td><?php echo $request->get_id(); ?></td>
                      <td><?php echo $request->get_status(); ?></td>
                      <td><?php echo $request->get_name(); ?></td>
                      <td><?php echo $request->get_last_name(); ?></td>
                      <td><?php echo $request->get_email();?></td>
                      <td><?php echo $request->get_phone(); ?></td>
                      <td><?php echo $request->get_DNI(); ?></td>

                      <?php $request->get_status()=="Aceptado"||$request->get_status()=="Rechazado"?$btn_status="disabled":$btn_status=""; ?>

                      <td><button type="button" class="btn btn-primary btn-details"  id-user="<?php echo $request->get_id(); ?>">Detalles</button></td>
                      <td><button type="button" class="btn btn-success btn-request"  btn-action="add" <?php echo $btn_status ?>  id-user="<?php echo $request->get_id(); ?>">Aceptar</button></td>
                      <td><button type="button" class="btn btn-danger btn-request" btn-action="delete" <?php echo $btn_status ?>  id-user="<?php echo $request->get_id(); ?>">Rechazar</button></td>
                       
                    </tr>

                     <?php  } ?>

                     

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>