@extends('layouts.workspace.layout')

@section("title")Inscripciones | Configuracion @endsection

@section('title-section') Configuracion de la inscripcion @endsection

@section('styles') 
	
	<link rel="stylesheet" href="{{asset('assets/css/workspace/config_inscriptions/index.css')}}">

@endsection()	

@section("main-content")



@if($access)
    @include('workspace.admin.inscriptions.config_open')	

@else
    @include('workspace.admin.inscriptions.config_close')

@endif    

@endsection

@section("scripts")
  
  <script src="{{asset('assets/LTE/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('assets/LTE/plugins/inputmask/jquery.inputmask.min.js')}}"></script>  
  <script src="{{asset('assets/LTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset("assets/js/modules/config_inscriptions.js")}}" type="module"></script>
 {{-- Docs table --}}
  <script>
              // start   events on cupos table ***************************************************************
        const submit_cupos = document.querySelector('#cupos_btn')
        const error_message = document.querySelector('.limit_error')
        document.querySelector('table.cupos').addEventListener('input', (e) => {
            const input = e.target
            const tr = input.closest('tr')
            const inp_restante = tr.querySelector('.restantes')
            const inp_asignados = tr.querySelector('.asignados')
            const aceptados = tr.querySelector('.aceptados')
            const progress = tr.querySelector('.progress-bar')
            const asig_val = inp_asignados.value
            const acep_val = +aceptados.textContent
            const rest_val = inp_restante.value

            if (input.classList.contains('asignados')) {
                inp_restante.value = asig_val - acep_val    
            }
            if (input.classList.contains('restantes')){
                inp_asignados.value = acep_val + +rest_val
            }

            progress.style.width = `${getPercent(asig_val, acep_val)}%`
            submit_cupos.classList.remove('d-none')
            submit_cupos.classList.add('opacity_1')


        })

        function getPercent(total, amount){
            return ((amount / total) * 100)
        }


        /// ***** star documents table config *************************************************************************
        const submit_docs = document.querySelector('#docs_btn')
        let table_docs = document.querySelector('#table_docs')
        let all_row = table_docs.querySelectorAll('tbody tr')
        let tbody = table_docs.querySelector("tbody")
        const tfoot = table_docs.querySelector("tfoot")
        let n_unidades = all_row.length;
        $("#N_uni")[0].value = n_unidades;
        let textareastable_docs = table_docs.querySelectorAll("tbody textarea")
        const move_hist_btns = document.querySelector(".move_hist_btns")
        const past_btn = document.querySelector(".past")
        const future_btn = document.querySelector(".future")
        const form = document.querySelector(".row_table_plan")
        let checkboxs = table_docs.querySelectorAll("input[type=checkbox]")
        let allow = true;

        table_docs.onchange = () => {
            getData()
        }

        table_docs.oninput = () => {
            submit_docs.classList.remove('d-none')
            submit_docs.classList.add('opacity_1')
        }

        function textareasFuctions(firts_time = false) {
            textareasTable = document.querySelectorAll("tbody textarea")
            textareasTable.forEach(t => {
                if (firts_time) adjustTextareaHight(t)
                t.oninput = () => {
                    adjustTextareaHight(t)
                }
                t.onchange = () => {
                    if (allow) {
                        allow = true
                    }
                }
            })
        }
        function adjustTextareaHight(t) {
            t.style.height = 'auto';
            let scrollH = t.scrollHeight;
            t.style.height = `calc(${scrollH}px + 12px )`;
            allow = true
        }
        textareasFuctions(true)


        function addRow(get_data = true) {
            let tr = document.createElement('tr')
            let new_n = n_unidades + 1
            tr.id = `tr${new_n}`
            const tds = `
            <td class="text-bold td_unidad">${new_n}</td>
            <td class="each_cell"><textarea name="tema${new_n}" id="">
                </textarea>
            </td>
            <td class="text-center align-middle each_cell">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="solicitado${new_n}" name="requested${new_n}-1">
                        <label class="custom-control-label" for="solicitado${new_n}"></label>
                    </div>
                </div>
            </td>

            <td class="text-center align-middle each_cell">
                <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="requerido${new_n}" name="required${new_n}-2">
                    <label class="custom-control-label" for="requerido${new_n}"></label>
                </div>
                </div>
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
            checkboxs = document.querySelectorAll('input[type=checkbox]')
            allow = false;
            if (get_data) getData()
            $("#N_uni")[0].value = n_unidades;

        }

           // focus textarea when click in its td
        function focusWithClick() {
            document.querySelectorAll(".each_cell").forEach(td => {
                td.onclick = () => {
                    const texta = td.querySelectorAll('textarea')
                    if (texta) {
                        const texta_len = texta.value.length
                        if (!(texta.value.trim().length === 0)) {
                            texta.setSelectionRange(texta_len, texta_len)
                        }
                        texta.focus()

                    }
                }
            })
        }
        focusWithClick()

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
            $("#N_uni")[0].value = n_unidades;
        }
        deleteRow()
        // save data for then go back or next

        let history = []
        let now = '';
        function getData() {
            let new_data = { 'n_unidades': n_unidades, 'texta_values': [...textareasTable, ].map(t => t.value), 'checkbox_values': [...checkboxs].map(t => t.checked)  }
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
            if (now < 1) {
                past_btn.classList.add('disabled')

            } 


        }
        getData()

        const goBack = () => {
            if (now > 0) {
                moveHist(history[--now])

                future_btn.classList.remove('disabled')
            }
            if (now == 0) {
                past_btn.classList.add('disabled')
                submit_date.classList.add('d-none')
                submit_docs.classList.remove('opacity_1')

            }
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
            textareasTable.forEach((t, i) => t.value = arr['texta_values'][i])
            checkboxs.forEach((che, i) => che.checked = arr['checkbox_values'][i])
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

@endsection


