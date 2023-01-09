@extends('layouts.workspace.layout')

@section("title")Workspace | Perfil de Institución @endsection

@section('title-section') Perfil de Institución @endsection

@section("main-content")
	           
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center square">
                                        <img class="profile-user-img"
                                            src="{{asset("assets/img/complete_logo.png")}}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center mt-4">VillaDonq</h3>

                                    <p class="text-muted text-center"></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Estud. activos</b> <a class="float-right">922</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Estud. Graduados</b> <a class="float-right">2643</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Estud. desertores</b> <a class="float-right">87</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Personal docente</b> <a class="float-right">14</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Personal administrativo</b> <a class="float-right">10</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div>
                                            <form class="form-horizontal" id="form-institution-info" action="{{route('create_institution_profile')}}">
                                            	@csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName"
                                                            placeholder="Nombre" name="name" value="{{$info->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputRif"
                                                    class="col-sm-2 col-form-label">Rif</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputRif"
                                                        placeholder="Rif" name="rif" value="{{$info->rif}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTel"
                                                        class="col-sm-2 col-form-label">Telefono</label>
                                                    <div class="col-sm-10">
                                                        <input type="Tel" class="form-control" id="inputTel"
                                                            placeholder="Tel" name="phone_number" value="{{$info->phone_number}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail"
                                                            placeholder="Email" name="email" value="{{$info->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputDirección"
                                                    class="col-sm-2 col-form-label">Dirección</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputDirección"
                                                        placeholder="Dirección" name="address">{{$info->address}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputInauguración" class="col-sm-2 col-form-label">Inauguración</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="inputInauguración"
                                                            placeholder="Inauguración" value="{{$info->release}}" name="release">
                                                    </div>
                                                </div>
                                             
                                                <div class="form-group row">
                                                    <label for="inputLema" class="col-sm-2 col-form-label">Lema</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputLema"
                                                            placeholder="Lema" value="{{$info->motto}}" name="motto">
                                                    </div>
                                                </div>
                                             
                                          
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn_submit mt-0" id="btn-send">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            
	
@endsection

@section("scripts")
	
	<script src="{{asset("assets/js/modules/institution_profile.js")}}" type="module"></script>

@endsection()
