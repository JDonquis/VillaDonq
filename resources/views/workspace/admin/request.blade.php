@extends('layouts.workspace.layout')

@section("title")Workspace | Solicitudes @endsection

@section('title-section') Solicitudes @endsection

@section('styles') 

	{{-- <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css') }}"> --}}
	
	
	<link rel="stylesheet" href="{{asset('assets/LTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/LTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/workspace/request/index.css') }}">

@endsection()	

@section("main-content")


<div class="row">

	<div class="col-12">
	    <div class="card">
	      <div class="card-header "></div>
		      <div class="d-flex  justify-content-center align-content-center py-3"> 
		      		<button class="btn btn-outline-primary">Sin Revisar</button>
		      		<button class="btn btn-outline-primary mx-4">Aceptados</button>
		      		<button class="btn btn-outline-primary">Rechazados</button>
		       </div>
	      <div class="card-body table-responsive  p-0" >
				<table id="example" class="display w-100  table-head-fixed table mw-100">
					<thead>
					<tr>
						<th></th>
						<th data-priority="1" >Año Solicitado:</th>
						<th data-priority="2" >Nombre:</th>
					    <th data-priority="2" >Apellido:</th>
					    <th>DNI:</th>
					    <th>Direccion:</th>
					    <th>Fecha de Nacimiento:</th> 
		                <th>Edad:</th>
		                <th>Acta de nacimiento:</th>
		                <th>Boleta:</th>
		                <th>Notas Certificadas:</th>
		                <th>Certificado Buena Conducta:</th>
		                <th>Foto:</th>
		                <th>Nombre Representante:</th>
		                <th>DNI Representante:</th>
		                <th>Numero de Representante:</th>

					    <th data-priority="3">Accion:</th>
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

@endsection

@section("scripts")
	
	<script src="{{asset("assets/LTE/plugins/datatables/jquery.dataTables.js")}}"></script>
	<script src="{{asset("assets/LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{asset("assets/js/modules/request_students.js")}}" type="module"></script>	

@endsection()
