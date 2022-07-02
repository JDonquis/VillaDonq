<?php require_once $_SERVER["DOCUMENT_ROOT"]."/VillaDonq/helpers/type_user.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/routes/routes.php"; ?>
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
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../css/general_plantilla.css">

    <link rel="stylesheet" href="../../css/notas.css">
    <title>Notas</title>
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
        <?php require_once('../../sections/_prof-menu.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <!-- SELECT2 EXAMPLE -->

                            <h1 class="m-0">Notas</h1>

                            <div class="row mt-2">
                                <div class="col-12 col-sm-6">

                                    <div class="form-group">

                                        <label>Materia</label>
                                        <select class="form-control select2 select2-primary"
                                            data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected="selected">Biologia</option>
                                            <option>Matematica</option>
                                            <option>Física</option>
                                            <option>Escritura y compresión lectora</option>
                                            <option>ect ect</option>

                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <label>sección</label>
                                        <select class="form-control" data-dropdown-css-class="select2-primary"
                                            style="width: 100%;">
                                            <option selected="selected">5to A</option>
                                            <option>2do B</option>
                                            <option>2do C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <form class="form-group">
                                        <label>Lapsos</label>

                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="customRadio1"
                                                    name="customRadio">
                                                <label for="customRadio1" class="custom-control-label">1</label>
                                            </div>
                                            <div class="custom-control custom-radio mx-4">
                                                <input class="custom-control-input" type="radio" id="customRadio2"
                                                    name="customRadio" checked>
                                                <label for="customRadio2" class="custom-control-label">2</label>
                                            </div>

                                        </div>


                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>

                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form class="row  row_table_plan">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-group d-flex float-left mt-2 move_hist_btns">
                                        
                                        <div class="btn_prints "></div>
                                    </div>

                                    <div class="card-tools">
                                        <span class="parent_btn_submit d-none"><input title='Ctrl + s' type="submit"
                                                name="" value="GUARDAR" class=" btn_submit mt-0"></span>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="max-height: 500px;">
                                    <table
                                        class="asist_table table table-head-fixed text-nowrap table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th_estudiante"> Estudiantes </th>
                                                <th>
                                                    Ev. 1
                                                    <div class="ev_details">
                                                        <p class="tema">Presente simple</p>
                                                        <p class="estrategia">Examen escrito</p>
                                                        <div class="calification_info">
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    Ev. 2
                                                    <div class="ev_details">
                                                        <p class="tema">Verbo To Be</p>
                                                        <p class="estrategia">Exposición</p>
                                                        <div class="calification_info">
                                                        </div>

                                                    </div>
                                                </th>
                                                <th>
                                                    Ev. 3
                                                    <div class="ev_details">
                                                        <p class="tema">Pasado perfecto</p>
                                                        <p class="estrategia">Dialogo</p>
                                                        <div class="calification_info">
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    Ev. 4
                                                    <div class="ev_details">
                                                        <p class="tema">Tag questions</p>
                                                        <p class="estrategia">Cuestionario</p>
                                                        <div class="calification_info">
                                                        </div>
                                                    </div>
                                                </th>

                                                <th class="th_total">
                                                    Total
                                                    <div class="ev_details">
                                                        
                                                    </div>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="tr1">
                                                <td class=" td_estudiante">
                                                    Juan Francisco Villasmil
                                                </td>
                                                <td class="p-0 each_cell">
                                                    <input type="number" value="01"><span class="d-none">01</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="10"> <span class="d-none">10</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="13"> <span class="d-none">13</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="12"> <span class="d-none">12</span></td>
                                                <td class="total"><input type="number" name=""
                                                        value="09" disabled>
                                                    <span class="d-none">09 </span>
                                                </td> 

                                            </tr>
                                            <tr id="">
                                                <td class=" td_estudiante">
                                                    Dalexer Colina
                                                </td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="14"> <span class="d-none">14</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="15"> <span class="d-none">15</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="16"><span class="d-none">16</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="17.5"> <span class="d-none">17.5</span></td>
                                                <td class="total "><input type="number" name=""
                                                        value="16" disabled>
                                                    <span class="d-none">16</span>
                                                </td>

                                            </tr>
                                            <tr id="">
                                                <td class=" td_estudiante">
                                                    Juan Donquis
                                                </td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="19"> <span class="d-none">19</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="18"><span class="d-none">18</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="09"> <span class="d-none">09</span></td>
                                                <td class="p-0 each_cell"><input type="number"
                                                        value="17"> <span class="d-none">17</span></td>
                                                <td class="total "><input type="number" name=""
                                                        value="18" disabled>
                                                    <span class="d-none">18</span>
                                                </td>

                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>



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


    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $.fn.dataTable.ext.order['dom-text'] = function (settings, col) {
            return this.api().column(col, { order: 'index' }).nodes().map((td, i) => $('input', td).val());
        };



        const n_evaluaciones = 4
        const n_estudiantes = 3


        $(function () {
            let type_order = { orderDataType: 'dom-text', type: 'string' }
            let n_order_columns = [null]
            for (let n = 0; n < n_evaluaciones + 1; n++) {
                n_order_columns.push(type_order)
            }
            $("table").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false, 'paging': false,
                "columns": n_order_columns,
                "ordering": true,
                "buttons": [{
                    extend: 'pdfHtml5',
                    exportOptions: {
                        format: {
                            header: function (data) {
                                return $('<div></div>')
                                return $('.data')
                                    .find('.ev_details')
                                    .remove()
                                    .end()
                                    .text()
                            }
                        }
                    }
                }
                    , "excel", "pdf", "print", "colvis"],


            }).buttons().container().appendTo('.btn_prints');

        });
        window.addEventListener('load', () => {
            let input_search = document.querySelector('div.dataTables_wrapper div.dataTables_filter label input')
            input_search.placeholder = 'Buscar estudiante'
        })



        let btn_dataTables = document.querySelector(".btn_prints")
        const btn_submit = document.querySelector(".parent_btn_submit")
        let all_totals = document.querySelectorAll(".total input")
        let all_inputs = document.querySelectorAll(".each_cell input")
        let all_tr = document.querySelectorAll('tbody tr')
        let all_calification_info = document.querySelectorAll(".calification_info")
        const total_th_info = document.querySelector(".th_total .ev_details")
        all_tr.forEach((each_tr, tr_index) => {


            each_tr.querySelectorAll('.each_cell input').forEach((each_input, input_index) => {

                each_input.oninput = () => {
                    all_totals[tr_index].value = [...each_tr.querySelectorAll('.each_cell input')].map(v => +v.value).reduce((acc, actual) => acc + actual) / n_evaluaciones;
                    reproveInRed()
                    gradesEvalInfo(input_index)
                    allTotalInfo
                    btn_submit.classList.remove('d-none')
                    btn_dataTables.classList.add('d-none')
                }
            })
            each_tr[tr_index]
        })

        // 
        function reproveInRed(params) {
            all_totals.forEach(each_total => {
                each_total.value < 10 ? each_total.classList.add('text-danger') : each_total.classList.remove('text-danger')


            })
        }
        reproveInRed()
        function gradesEvalInfo(index) {
            // calculate in the current col changed
            let grades_col = [...all_tr].map(trn => +trn.querySelectorAll('input')[index].value);
            let n_failed = grades_col.filter(v => v < 10).length
            let n_failed_porcent = getPercent(n_failed)
            let n_pass = grades_col.filter(v => v >= 10).length
            let n_pass_porcent = getPercent(n_pass)

            //calculate the total colums
            

            //insert in DOM 
            all_calification_info[index].innerHTML = `<p class="reprobados text-danger">R: ${n_failed} (${n_failed_porcent}%) </p>
                                    <p class="aprobados text-success">A: ${n_pass} (${n_pass_porcent}%)</p>`
            
            
        }
      
        for (let i_ev = 0; i_ev < n_evaluaciones; i_ev++) {
            gradesEvalInfo(i_ev)

        }
        function allTotalInfo() {
            let totals_col = [...all_totals].map(tv => tv.value)
            let totals_failed = totals_col.filter(v => v<10).length
            let totals_failed_porcent = getPercent(totals_failed)
            let totals_pass = totals_col.filter(v => v >= 10).length
            let totals_pass_porcent = getPercent(totals_pass)
            total_th_info.innerHTML = `<p class="reprobados text-danger">R: ${totals_failed} (${totals_failed_porcent}%) </p>
                                    <p class="aprobados text-success">A: ${totals_pass} (${totals_pass_porcent}%)</p>`
        }
        allTotalInfo()
        function getPercent(num) {
            let r = ((num / n_estudiantes) * 100)
            return r % 1 == 0 ? Math.trunc(r) : r.toFixed(1)
        }

    </script>

</body>

</html>