<style type="text/css">


</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../css/secciones.css">
    <title>Secciones</title>
</head>

<body>


    <div class="wrapper">
        <?php require_once "../../../includes/_loader.php"; ?>
        <!-- Navbar -->
        <?php require_once "../../sections/_nav-bar.php"; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once "../../sections/_administrative-menu.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <!-- SELECT2 EXAMPLE -->

                            <h1 class="mb-3">Secciones</h1>


                        </div>

                    </div>

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid" id="content_itself">
                    <div class="tooltip_child change_box d-none">
                        <p class="mb-1"> Cambiar a la sección: </p>
                        <div class="d-flex">

                            <select class="w-75 form-control text-bold" data-use="select_new_section" name="">
                                <option selected="selected">1A</option>
                                <option>1B</option>
                                <option>1C</option>
                                <option>1D</option>
                                <option>1E</option>
                            </select>
                            <span class="w-25  parent_btn_submit">
                                <i title="Cambiar" class="btn_submit rounded mt-0 btn_change_acept fas fa-person-walking-dashed-line-arrow-right"></i>
                            </span>

                        </div>
                    </div>
                    <div class="d-flex flex-column-reverse flex-sm-row justify-content-between">

                        <div class="form-group mb-0 año_academico_div bg-3">
                            <label>Año academico</label>
                            <div class="row align-items-center">

                                <select id="yearInput" class="form-control ml-1 color-primary">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                            </div>
                        </div>
                        <div class="text-right año_academico_div bg-1">
                            <p class="h6 mb-2">En la institución</p>
                            <label for="aulas">aulas <input min="19" type="number" class="d-inline form-control col-4 ml-2" name="" value="20" id="total_rooms"></label>
                            <p>Total de secciones: <b id="total_sections">19</b></p>
                            <p>Aulas libres: <b id="free_classrooms">1</b></p>
                        </div>
                    </div>

                    <section class=" each_year active" data-year="1">
                        <div class="ml-2 container_nro_est_y_matricula">
                            <p class="color-primary mb-0">Nro de estudiantes: <b class="nStudentsByYear">30</b></p>
                            <p class="color-primary mb-0">Nro de secciones: <b class="nSectionsByYear">2</b></p>
                        </div>
                        <div class="card">
                            <div class="card-h p-2 d-flex">
                                <ul class="nav nav-pills sections_nav">
                                    <li class="nav-item"><a class="nav-link active" href="#A1" data-toggle="tab">A</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#B1" data-toggle="tab">B</a></li>
                                </ul>

                                <div class="form-group ml-3 mt-2">
                                    <button data-nsections="2" for='new_subject_name' class="mx-auto border-0 d-block d-none add_btn"><b>+</b> Nueva</button>
                                </div>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <article class="each_section tab-pane active" data-section="A" id="A1">

                                        <div class="mx-auto each_section_header">
                                            <h4 class="h5">Sección 1A</h4>
                                            <p>matricula: <b class="matricule" data-section="A">6</b> </p>
                                        </div>


                                        <div class=" table-responsive">
                                            <table data-section="A" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th data-priority="1">Nombres </th>
                                                        <th>Apellidos</th>
                                                        <th>Foto</th>
                                                        <th>Cedula</th>
                                                        <th>Edad</th>
                                                        <th>Tel del representante</th>
                                                        <th>correo</th>
                                                        <th data-priority="2">acción</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="1">Juan Francisco</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="2">Douglas Javier</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="3">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="4">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td> <span data-id="5">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="6">Juan Diego</span> </td>
                                                        <td>Donquis Gonzales</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>mondonquis@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </article>

                                    <article class="each_section tab-pane" data-section="B" id="B1">
                                        <div class="">
                                            <div class="mx-auto each_section_header">
                                                <h4 class="h5">Sección 1B</h4>
                                                <p>matricula: <b class="matricule" data-section="B">3</b> </p>
                                            </div>
                                        </div>
                                        <div class=" table-responsive">
                                            <table data-section="B" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th data-priority="1">Nombres </th>
                                                        <th>Apellidos</th>
                                                        <th>Foto</th>
                                                        <th>Cedula</th>
                                                        <th>Edad</th>
                                                        <th>Tel del representante</th>
                                                        <th>correo</th>
                                                        <th data-priority="2">acción</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="7">Juan Francisco</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="8">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="9">Juan Diego</span> </td>
                                                        <td>Donquis Gonzales</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>mondonquis@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </article>
                                </div>


                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </section><!-- /.card-body -->

                    <section class="each_year " data-year="2">
                        <div class="ml-2 container_nro_est_y_matricula">
                            <p class="color-primary mb-0">Nro de estudiantes: <b class="nStudentsByYear">10</b></p>
                            <p class="color-primary mb-0">Nro de secciones: <b class="nSectionsByYear">3</b></p>
                        </div>
                        <div class="card">
                            <div class="card-h p-2 d-flex">
                                <ul class="nav nav-pills sections_nav">
                                    <li class="nav-item"><a class="nav-link active" href="#A2" data-toggle="tab">A</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#B2" data-toggle="tab">B</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#C2" data-toggle="tab">C</a></li>
                                </ul>

                                <div class="form-group ml-3 mt-2">
                                    <button data-nsections="2" for='new_subject_name' class="mx-auto border-0 d-block d-none add_btn"><b>+</b> Nueva</button>
                                </div>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <section class="tab-content">

                                    <article class="each_section tab-pane active" data-section="A" id="A2">

                                        <div class="mx-auto each_section_header">
                                            <h4 class="h5">Sección 2A</h4>
                                            <p>matricula: <b class="matricule" data-section="A">3</b> </p>
                                        </div>


                                        <div class=" table-responsive">
                                            <table data-section="A" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th data-priority="10">Nombres </th>
                                                        <th>Apellidos</th>
                                                        <th>Foto</th>
                                                        <th>Cedula</th>
                                                        <th>Edad</th>
                                                        <th>Tel del representante</th>
                                                        <th>correo</th>
                                                        <th data-priority="2">acción</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="11">Juan Francisco</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="12">Douglas Javier</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="13">Juan Diego</span> </td>
                                                        <td>Donquis Gonzales</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>mondonquis@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </article>

                                    <article class="each_section tab-pane" data-section="B" id="B2">
                                        <div class="">
                                            <div class="mx-auto each_section_header">
                                                <h4 class="h5">Sección 2B</h4>
                                                <p>matricula: <b class="matricule" data-section="B">3</b> </p>
                                            </div>
                                        </div>
                                        <div class=" table-responsive">
                                            <table data-section="B" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th data-priority="14">Nombres </th>
                                                        <th>Apellidos</th>
                                                        <th>Foto</th>
                                                        <th>Cedula</th>
                                                        <th>Edad</th>
                                                        <th>Tel del representante</th>
                                                        <th>correo</th>
                                                        <th data-priority="2">acción</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="15">Juan Francisco</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="16">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="17">Juan Diego</span> </td>
                                                        <td>Donquis Gonzales</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>mondonquis@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </article>

                                    <article class="each_section tab-pane" data-section="C" id="C2">
                                        <div class="">
                                            <div class="mx-auto each_section_header">
                                                <h4 class="h5">Sección 2C</h4>
                                                <p>matricula: <b class="matricule" data-section="C">4</b> </p>
                                            </div>
                                        </div>
                                        <div class=" table-responsive">
                                            <table data-section="C" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th data-priority="18">Nombres </th>
                                                        <th>Apellidos</th>
                                                        <th>Foto</th>
                                                        <th>Cedula</th>
                                                        <th>Edad</th>
                                                        <th>Tel del representante</th>
                                                        <th>correo</th>
                                                        <th data-priority="2">acción</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="19">Juan Francisco</span> </td>
                                                        <td>Villasmil Tovar</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>27253194</td>
                                                        <td>22</td>
                                                        <td>0426037352</td>
                                                        <td>juanvillans16@gmail.com</td>
                                                        <td class="td_action"><i title="Cambiar de sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="20">Dalexer noseque</span> </td>
                                                        <td>Colina Ramirez</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>29342184</td>
                                                        <td>20</td>
                                                        <td>0212438719</td>
                                                        <td>dalexercivirigua@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo p-relative fas fa-person-walking-dashed-line-arrow-right">

                                                            </i></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="21">Juan Diego</span> </td>
                                                        <td>Donquis Gonzales</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>mondonquis@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="checkbox" name=""></td>
                                                        <td><span data-id="22">Fulanito Perez</span> </td>
                                                        <td>Pancho sanco</td>
                                                        <td><a href="#">ver foto</a></td>
                                                        <td>30101010</td>
                                                        <td>15</td>
                                                        <td>0269356969</td>
                                                        <td>prueba@gmail.com</td>
                                                        <td class="td_action"><i title="Mover a otra sección" class="btn_change_solo fas fa-person-walking-dashed-line-arrow-right"></i>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </article>
                                </section>


                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </section><!-- /.card-body -->
                </div>

                <nav class="nav_fixed">
                    <i title="Cambiar de sección" class=" btn_change_all position-relative d-none  fas fa-person-walking-dashed-line-arrow-right"></i>
                    <span class="parent_btn_submit ">
                        <input title='Ctrl + s' type="submit" name="save-date" value="Guardar" class="btn_submit p-2 mt-0 d-none" id="btn_save">
                    </span>
                </nav>

        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    </div>
    <?php require_once "../../sections/_footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->





    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <!-- <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
    <!-- <script src="../../plugins/jszip/jszip.min.js"></script> -->
    <!-- Toastr -->
    <script src="../../plugins/toastr/toastr.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            $("table.display").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                'paging': false,
                "ordering": true,
                'columnDefs': [{
                    'orderable': false, // set orderable false for selected columns
                    'targets': [0, 1], // column index (start from 0)
                    'content': " ",
                }]
            })
        });
    </script>
    <script type="module" src="../../js/modules/secciones.js"></script>
</body>

</html>