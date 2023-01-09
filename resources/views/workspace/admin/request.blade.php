@extends('layouts.workspace.layout')

@section("title")Workspace | Solicitudes @endsection

@section('title-section') Solicitudes @endsection

@section('styles') 
	
	<link rel="stylesheet" href="{{asset('assets/LTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/LTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/hamburger_css/hamburger.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/workspace/request/index.css') }}">

@endsection()	

@section("main-content")


<div class="row">

	<div class="col-12">
	    <div class="card">
	      <div class="card-header border-0 "></div>
		      <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center  py-3"> 
		      		<button class="btn btn-outline-primary btn-outline  mt-10px btn-filter" id-action='3'>Sin Revisar</button>
		      		<button class="btn btn-outline-primary btn-outline  mt-10px mx-4 btn-filter" id-action='1'>Aceptados</button>
		      		<button class="btn btn-outline-primary btn-outline  mt-10px btn-filter" id-action='2'>Rechazados</button>
		       </div>
		       <div class="d-flex justify-content-center align-items-center">
		            <div class="form-group">

                                        <label>Año escolar</label>
                                        <select class="form-select select-edit"  id="years_select" name="year" 
                                            style="width: 200px;">
                                            <option selected="selected" value="all">Todos</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select>
                      </div>
                </div>
	      <div class="card-body table-responsive  p-0" >
				<table id="example" class="display w-100 responsive table-head-fixed table mw-100">
					<thead>
					<tr>
						<th></th>
						<th data-priority="1" id="field_year" >Año Solicitado:</th>
						<th data-priority="2" >Nombre:</th>
					    <th data-priority="2" >Apellido:</th>
					    <th>DNI:</th>
					    <th>Correo:</th>
					    <th>Direccion:</th>
					    <th>Fecha de Nacimiento:</th> 
		                <th>Edad:</th>
		                <th>Nombre Representante:</th>
		                <th>DNI Representante:</th>
		                <th>Numero de Representante:</th>
		                <th>Documentos:</th>
					    <th data-priority="3" class="no-sort">Accion:</th>
					</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				@csrf
				

		 </div>
	   </div>
	</div>
</div>

<div class="full-screen flex-center d-none" id="modal-document">
	

</div>

@endsection

@section("scripts")
	
	<script src="{{asset("assets/LTE/plugins/datatables/jquery.dataTables.js")}}"></script>
	<script src="{{asset("assets/LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{asset("assets/js/modules/request_students.js")}}" type="module"></script>	

@endsection()
