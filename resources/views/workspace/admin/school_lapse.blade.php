@extends('layouts.workspace.layout')

@section("title")Workspace | Periodo Escolar @endsection

@section('title-section') Periodo Escolar @endsection

@section("main-content")
	           
               
            <div class="container-fluid">
                   <form method="POST" id="form-lapses"  class="w-100">
                     @csrf                     
                        <div class="row justify-content-around">

                            <div class="col-3">
                                <h4>1er Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start-1" class="form-control">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end-1" class="form-control">
                            </div>
                            <div class="col-3">
                                <h4>2do Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start-2" class="form-control">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end-2" class="form-control">
                            </div>
                            <div class="col-3">
                                <h4>3er Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start-3" class="form-control">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end-3" class="form-control">
                            </div>

    	                </div>
                         <input title='Ctrl + s' type="submit" name="save-lapses" value="Guardar fechas" class="btn_submit mt-5 mx-auto p-2 w-50" id="date_btn">

                    </form>
            </div>
@endsection

@section("scripts")
	
    <script src="{{asset("assets/js/modules/school_lapse.js")}}" type="module"></script>

@endsection()
