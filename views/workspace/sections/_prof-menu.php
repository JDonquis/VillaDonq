<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo WORKSPACE_INDEX; ?>" class="brand-link">
                <img src="<?php echo URL_LOGO; ?>" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Workspace</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
                      <div class="image">
                          <img src="<?php echo URL_USER_IMAGES;?><?php echo $user->get_photo()=='photo'?'default.png':$user->get_photo(); ?>" class="img-circle elevation-2" alt="User Image">
                      </div>
                      
                      <div class="info">
                          <a href="#" class="d-block"> <?php echo $user->get_name(); ?></a>
                      </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
    
                        <li class="nav-item">
                            <a href="<?php echo URL_PAGES_PROFESOR;?>plan_de_evaluacion.php" class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>Plan de evaluación</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL_PAGES_PROFESOR; ?>notas.php" class="nav-link">
                                <i class="nav-icon  fa fa-graduation-cap"></i>
                                <p> Notas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL_PAGES_PROFESOR; ?>asistencia.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Asistencia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL_PAGES_PROFESOR; ?>matricula.php" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Matricula</p>
                            </a>
                           
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>Mi horario</p>
                            </a>
                           
                        </li>
                  
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>