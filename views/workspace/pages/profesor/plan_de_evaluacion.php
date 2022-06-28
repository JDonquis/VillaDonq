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
    <link rel="stylesheet" href="../../css/general_plantilla.css">
    <link rel="stylesheet" href="../../css/plan_evaluacion.css">
    <title>Plan de evaluación</title>
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
                            <h1 class="m-0">Plan de evaluación</h1>

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

                                        <label>Año escolar</label>
                                        <select class="form-control" data-dropdown-css-class="select2-primary"
                                            style="width: 100%;">
                                            <option selected="selected">1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                    </div>
                                </div>
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

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form class="row  row_table_plan">
                        <div class="col-12">
                            <div class="card parent_pdf">
                                <div class="card-header">
                                    <div class="form-group float-left mt-2 move_hist_btns">
                                        <button type="button" onclick="goBack()" title="revertir cambio ( ctrl + z )"
                                            class=" disabled fa-solid history_arrows past fa-arrow-rotate-left"></button>
                                        <button type="button" onclick="goNext()" title="volver al cambio ( ctrl + y )"
                                            class="fa-solid history_arrows future fa-arrow-rotate-right disabled ml-2 mr-4"></button>
                                    </div>

                                    <div class="card-tools ">
                                        <span class="parent_btn_submit"><input title='Ctrl + s' type="submit" name=""
                                                value="GUARDAR" class=" btn_submit mt-0"></span>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="max-height: 700px;">
                                    <table class="asist_table table table-head-fixed text-nowrap table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th_unidad"> Unidades </th>
                                                <th>Tema</th>
                                                <th>Contenido</th>
                                                <th>Estrategia</th>
                                                <th class="th_valor">Valor</th>
                                                <th class="th_valor">Eliminar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="tr1">
                                                <td class="text-bold td_unidad">
                                                    1
                                                </td>
                                                <td class="p-0 each_cell"><textarea
                                                        name="tema1">presente simple</textarea></td>
                                                <td class="p-0 each_cell"><textarea
                                                        name="contenido1">contenido bla bla bla bla extera excetara nojda</textarea>
                                                </td>
                                                <td class="p-0 each_cell"><textarea
                                                        name="estrategia1">mapa mixto</textarea></td>
                                                <td class="td_valor p-0 each_cell"><textarea name=""
                                                        id="">18+2</textarea>
                                                </td>
                                                <td class="borrar text-center"><i class="fa-solid fa-xmark"
                                                        id="br1"></i></td>

                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="btn_more" title="Agregar nueva  (ctrl + enter)">
                                                    <i class="fa-solid fa-plus"></i> Nueva unidad
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

    <!-- <script src="../../plantilla_js/jsPDF.js" type="module"></script> -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>

    <script>
        let all_row = document.querySelectorAll('tbody tr')
        let table = document.querySelector('table')
        let tbody = document.querySelector("tbody")
        const tfoot = document.querySelector("tfoot")
        let n_unidades = all_row.length;
        let textareasTable = document.querySelectorAll("tbody textarea")
        const move_hist_btns = document.querySelector(".move_hist_btns")
        const past_btn = document.querySelector(".past")
        const future_btn = document.querySelector(".future")
        const form = document.querySelector(".row_table_plan")
        let allow = true;


        function textareasFuctions(firts_time = false) {
            textareasTable = document.querySelectorAll("tbody textarea")
            textareasTable.forEach(t => {
                if (firts_time) adjustTextareaHight(t)
                t.oninput = () => {
                    adjustTextareaHight(t)
                }
                t.onchange = () => {
                    if (allow) {
                        getData()
                        allow = true
                    }
                }

            })
        }
        function adjustTextareaHight(t) {
            t.style.height = 'auto';
            let scrollH = t.scrollHeight;
            t.style.height = `${scrollH}px`;
            allow = true
        }
        textareasFuctions(true)


        function addRow(get_data = true) {
            let tr = document.createElement('tr')
            let new_n = n_unidades + 1
            tr.id = `tr${new_n}`
            const tds = `<td class="text-bold td_unidad">${new_n}
                </td>
                <td class="each_cell"><textarea name="tema${new_n}" id=""></textarea></td>
                <td class="each_cell"><textarea name="contenido${new_n}" id=""></textarea></td>
                <td class="each_cell"><textarea name="estrategia${new_n}" id=""></textarea></td>
                <td class="td_valor p-0"><textarea name="valor${new_n}" id="" class="new">18+2</textarea>
                    </td>
                    <td class="borrar text-center"><i class="fa-solid fa-xmark" id="br${new_n}"></i></td>`

            tr.innerHTML = tds
            tbody.append(tr)
            $(tr).slideDown()
            let new_tema = document.getElementsByName(`tema${new_n}`)[0]
            new_tema.focus()
            textareasFuctions()
            focusWithClick()
            n_unidades++
            deleteRow()
            all_row = document.querySelectorAll('tbody tr')
            allow = false;
            if (get_data) getData()
        }

        // focus textarea when click in its td
        function focusWithClick() {
            document.querySelectorAll(".each_cell").forEach(td => {
                td.onclick = () => {
                    td.children[0].focus()
                }
            })
        }

        // delete row
        function deleteRow() {
            let all_borrar_btn = document.querySelectorAll(".borrar i")

            all_borrar_btn.forEach((btn_borrar) => {

                btn_borrar.onclick = () => {
                    let id_tr = btn_borrar.id
                    let n_id = id_tr.match(/[\d]/g).join('')

                    let row = document.querySelector(`#tr${n_id}`)
                    row.classList.add('removing')
                    n_id = +n_id
                    setTimeout(() => {
                        row.remove()
                        for (let j = n_id; j < n_unidades; j++) {
                            let edit_row = document.querySelector(`#tr${j + 1}`)
                            edit_row.id = `tr${j}`
                            let edit_b = document.querySelector(`#br${j + 1}`)
                            edit_b.id = `br${j}`
                            edit_row.children[0].textContent = j;
                        }
                        n_unidades--
                        getData()
                    }, 200);
                }

            })
        }

        // save data for then go back or next

        let history = []
        let now = '';
        function getData() {
            let new_data = { 'n_unidades': n_unidades, 'values': [...textareasTable].map(t => t.value) }
            if (now < history.length - 1) {
                history.splice(now + 1, history.length - (now + 1), new_data);
                future_btn.classList.add('disabled')
            }
            else {

                history.push(new_data)
            }
            if (now > 19) history.shift()
            now = history.length - 1
            past_btn.classList.remove('disabled')
            if (now < 1) past_btn.classList.add('disabled')
        }
        getData()

        const goBack = () => {
            if (now > 0) {
                moveHist(history[--now])
                future_btn.classList.remove('disabled')
            }
            if (now == 0) past_btn.classList.add('disabled')
        }


        const goNext = () => {
            if (now < history.length - 1) {
                moveHist(history[++now])
                past_btn.classList.remove('disabled')
            }
            if (now == history.length - 1) future_btn.classList.add('disabled')

        }


        function moveHist(arr) {
            tbody.replaceChildren()
            n_unidades = 0
            for (let i = 0; i < arr['n_unidades']; i++) {
                addRow(false);
            }
            textareasTable.forEach((t, i) => t.value = arr['values'][i])

            textareasFuctions(true)

        }

        document.querySelector(".btn_more").onclick = () => addRow()


        //  shortcuts
        document.addEventListener('keydown', e => {
            // to add new row ( new unite )
            if (e.key.toLowerCase() === 'enter' && e.ctrlKey) {
                e.preventDefault()
                addRow()
            }
            // to go back
            if (e.key.toLowerCase() === 'z' && e.ctrlKey) {
                e.preventDefault()
                goBack()
            }
            // to go next
            if (e.key.toLowerCase() === 'y' && e.ctrlKey) {
                e.preventDefault()
                goNext()
            }
            // save
            if (e.key.toLowerCase() === 's' && e.ctrlKey) {
                e.preventDefault()
                form.submit()
            }

        })




    </script>
</body>

</html>