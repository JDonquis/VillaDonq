@extends('layouts.workspace.layout')

@section("title")Workspace | Periodo Escolar @endsection

@section('title-section') Periodo Escolar @endsection

@section("main-content")
	           
               
            <div class="container-fluid">
                   <form id="form-lapses"  class="w-100" method="post">
                     @csrf                     
                        <div class="row justify-content-around">

                            <div class="col-3">
                                <h4>1er Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start_1" class="form-control" value="{{$laps[0]->start ?? ''}}">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end_1" class="form-control" value="{{$laps[0]->end ?? ''}}">
                            </div>
                            <div class="col-3">
                                <h4>2do Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start_2" class="form-control" value="{{$laps[1]->start ?? ''}}">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end_2" class="form-control" value="{{$laps[1]->end ?? ''}}">
                            </div>
                            <div class="col-3">
                                <h4>3er Lapso</h4>
                                <label for="" class="pt-2">Comienza: </label>
                                <input type="date" name="start_3" class="form-control" value="{{$laps[2]->start ?? ''}}">
                                <label for="" class="pt-2">Termina: </label>
                                <input type="date" name="end_3" class="form-control" value="{{$laps[2]->end ?? ''}}">
                            </div>

    	                </div>
                         <input title='Ctrl + s' type="submit" name="save-lapses" value="Guardar fechas" class="btn_submit mt-5 mx-auto p-2 w-50 d-none" id="date_btn">

                    </form>
            </div>


@endsection

@section("scripts")
	
    <script src="{{asset("assets/js/modules/school_lapse.js")}}" type="module"></script>
    <script>
        const all_dateInputs = document.querySelectorAll(`input[type="date"]`)
        all_dateInputs.forEach((inp, indx) => {
            inp.onchange = () => {
                document.querySelector('#date_btn').classList.remove('d-none')
                next_inp = all_dateInputs[indx+1]
                if (next_inp.value < inp.value || !next_inp[indx+1].value ) { 
                    next_inp.min = inp.value
                    next_inp.value = inp.value
                }
            }
        })
    </script>

@endsection()
