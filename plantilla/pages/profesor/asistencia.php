<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plantilla_css/general_plantilla.css">

    <link rel="stylesheet" href="../../plantilla_css/asistencia.css">
    <title>Asistencia</title>
</head>

<body>


    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('prof_navSidebar.php') ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- SELECT2 EXAMPLE -->

                            <h1>Control de asistencia</h1>
                            <div class="row mt-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Sección</label>
                                        <select class="form-control select2 select2-primary"
                                            data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6">
                                    <form class="form-group">
                                        <label>Lapsos</label>

                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1"
                                                    name="customRadio" checked>
                                                <label for="customRadio1" class="custom-control-label">1</label>
                                            </div>
                                            <div class="custom-control custom-radio mx-4">
                                                <input class="custom-control-input" type="radio" id="customRadio2"
                                                    name="customRadio">
                                                <label for="customRadio2" class="custom-control-label">2</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio3"
                                                    name="customRadio">
                                                <label for="customRadio3" class="custom-control-label">3</label>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Simple Tables</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header intro_table justify-content-between">
                                    <div class="form-group float-left d-sm-flex align-items-center mt-2 mb-0">
                                        <i title="revertir cambio"
                                            class=" disabled fa-solid history_arrows past  fa-arrow-rotate-left"></i>
                                        <i title="volver al cambio"
                                            class="fa-solid history_arrows future fa-arrow-rotate-right disabled ml-2 mr-4"></i>
                                        <div class="form-check mr-4">
                                            <input class="form-check-input" type="checkbox" id="marcar_todos">
                                            <label class="form-check-label" for="marcar_todos">
                                                Marcar todos asistentes
                                            </label>
                                        </div>
                                        <span class="d-flex align-items-center my-3 my-sm-0">
                                            <label for="input_n_classes" class="mb-0 pl-sm-5">Número de clases</label>
                                            <input type="number" value="13" class="p-1 ml-2 form-control"
                                                id="input_n_classes">
                                        </span>
                                    </div>
                                    <div class="float-sm-right">
                                        <span class="parent_btn_submit ">
                                            <input type="submit" title='Ctrl + s' name="" value="GUARDAR"
                                                class=" btn_submit mt-0">
                                        </span>
                                    </div>

                                    <!-- <div class="card-tools mt-2">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="max-height: 500px;">
                                    <table class="asist_table table table-head-fixed text-nowrap table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th_students"> Estudiantes </th>
                                                <th>
                                                    <label for="c1" title="marcar toda la columna 1 "> 1
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c1">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c2" title="marcar toda la columna 2 "> 2
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c2">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c3" title="marcar toda la columna 3 "> 3
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c3">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c4" title="marcar toda la columna 4 "> 4
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c4">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c5" title="marcar toda la columna 5 "> 5
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c5">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c6" title="marcar toda la columna 6 "> 6
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c6">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c7" title="marcar toda la columna 7 "> 7
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c7">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c8" title="marcar toda la columna 8 "> 8
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c8">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c9" title="marcar toda la columna 9 "> 9
                                                        <input type="checkbox" class="marcar_col_input" name="" id="c9">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c10" title="marcar toda la columna 10 "> 10
                                                        <input type="checkbox" class="marcar_col_input" name=""
                                                            id="c10">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c11" title="marcar toda la columna 11 "> 11
                                                        <input type="checkbox" class="marcar_col_input" name=""
                                                            id="c11">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c12" title="marcar toda la columna 12 "> 12
                                                        <input type="checkbox" class="marcar_col_input" name=""
                                                            id="c12">
                                                    </label>
                                                </th>
                                                <th>
                                                    <label for="c13" title="marcar toda la columna 13 "> 13
                                                        <input type="checkbox" class="marcar_col_input" name=""
                                                            id="c13">
                                                    </label>
                                                </th>




                                                <th class="th_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <label for="e1" title='marcar toda la fila'>

                                                        <input type="checkbox" class="marcar_fila_input mr-1" name=""
                                                            id="e1">
                                                        <span class="student_name">Fulanito perez</span>
                                                    </label>
                                                </td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_cell "></td>
                                                <td class="each_total">0%</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="e2">
                                                        <input type="checkbox" class="marcar_fila_input mr-1" name=""
                                                            id="e2">
                                                        <span class="student_name">pantaleona cabezona</span>
                                                    </label>
                                                </td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_total">0%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="e3">

                                                        <input type="checkbox" class="marcar_fila_input mr-1" name=""
                                                            id="e3">
                                                        <span class="student_name">Dolores Pecho Barba</span>
                                                    </label>
                                                </td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_total">0%</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="e4">

                                                        <input type="checkbox" class="marcar_fila_input mr-1" name=""
                                                            id="e4">
                                                        <span class="student_name"> Alan brito</span>
                                                    </label>
                                                </td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_cell"></td>
                                                <td class="each_total">0%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                </div>
                <!-- /.row -->
            </section>
        </div><!-- /.container-fluid -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>



    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script> $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })</script>
    <script src="../../plantilla_js/asistencia.js"></script>
</body>

</html>