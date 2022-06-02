  <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Solicitudes de Incripcion</h3>

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
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Estado</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>DNI</th>
                      <th>Direccion</th>
                      <th>Edad</th>
                      <th>Acta de nacimiento</th>
                      <th>Boleta</th>
                      <th>Notas Certificadas</th>
                      <th>Certificado Buena Conducta</th>
                      <th>Foto</th>
                      <th>Nombre Representante</th>
                      <th>Numero de Representante</th>
                      <th>Fecha de Nacimiento</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php foreach ($requests as $request){ ?>
                      
                    <tr>
                      <td><?php echo $request->get_id(); ?></td>
                      <td><?php echo $request->get_status(); ?></td>
                      <td><?php echo $request->get_name(); ?></td>
                      <td><?php echo $request->get_last_name(); ?></td>
                      <td><?php echo $request->get_email();?></td>
                      <td><?php echo $request->get_phone(); ?></td>
                      <td><?php echo $request->get_DNI(); ?></td>
                      <td><?php echo $request->get_address(); ?></td>
                      <td><?php echo $request->get_age(); ?></td>
                      <td><a href="../request_images/birth_certificate/<?php echo $request->get_birth_certificate(); ?>" target="blank">Ver Documento</a></td>
                      <td><a href="../request_images/report_card/<?php echo $request->get_report_card(); ?>" target="_blank">Ver Documento</a></td>
                      <td><a href="../request_images/certificate_notes/<?php echo $request->get_certified_notes(); ?>" target="blank">Ver Documento</a></td>
                      <td><a href="../request_images/certificate_conduct/<?php echo $request->get_certificate_conduct(); ?>" target="blank">Ver Documento</a></td>
                      <td><a href="../request_images/photo/<?php echo $request->get_photo(); ?>" target="blank">Ver Documento</a></td>
                      <td><?php echo $request->get_representative_name(); ?></td>
                      <td><?php echo $request->get_representative_phone_number(); ?></td>
                      <td><?php echo $request->get_date_birth(); ?></td>

                    </tr>

                     <?php  } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>