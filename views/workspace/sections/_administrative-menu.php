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
      

       <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">TASKS</li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
            <a href="request.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Solicitudes 
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
 </ul>
      </nav>

</div>
  </aside>



    