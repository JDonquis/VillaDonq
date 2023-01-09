






















const d = document;

var csrf = $('input[name="_token"]').attr('value');




export function datatable_request (repeat = 0)
{



    if(repeat == 1)
        $('#example').DataTable().ajax.reload();
    else{

    var t = $('#example');
        
    t.DataTable({

        "order":[],
        "responsive": true,
        "paging": true,
        "pagingType": "full_numbers",
        "language": {
              "emptyTable": "No hay solicitudes por responder.",
              "lengthMenu": "Mostrar _MENU_ solicitudes",
              "search":     "Buscar:",
              "info":       "Mostrando desde  _START_  a  _END_  de  _TOTAL_  solicitudes",
              "infoEmpty":      "Mostrando de 0 a 0 de 0 solicitudes",
              "zeroRecords":    "No se encuentran solicitudes",
              "paginate": {
              "first":      "Primero",
              "last":       "Ultimo",
              "next":       "Siguiente",
              "previous":   "Anterior"
        },
         },
        columnDefs:[
        {
           
                    className: 'dtr-control',
                    orderable: false,
                    targets:0,
                    data:'',
        }
         ],
        "ajax":{

            url: '/workspace/solicitudes/get',
            type: 'POST',
            dataSrc:function(json){
               
               console.log(json) 
               return json;
            },
            
            data:{
                "_token":csrf,
            },
            cache:false,

        },

        "columns":[

            {data:null, defaultContent:''},
            {data:'year'},
            {data:'name'},
            {data:'last_name'},
            {data:'DNI'},
            {data:'email'},
            {data:'address'},
            {data:'date_birth'},
            {data:'age'},         
            {data:'rep_name'},
            {data:'rep_DNI'},
            {data:'rep_phone_number'},
            {data:function(row){

                let link = `<a href='#' class='link-document' id='${row['id']}' >Ver documentos</a>`;
                return link;
            }

            },
            {data:function (row){


                let btns = ` 
                <button type='button' class='btn btn_submit btn-action btn-request' btn-action='add' status='${row['request_statu_id']}' id-request='${row['id']}' ${row['request_statu_id']!=3?'disabled':''} >Aceptar</button>
                <button type='button' class='btn btn-outline-primary btn-outline-reject btn-request' btn-action='delete' id-request='${row['id']}' ${ row['request_statu_id']!=3?'disabled':''}>Rechazar</button>`;
                return btns;
            }

                


            },

        ]

    })


    }
}

export function likn_documents(link)
{
    d.addEventListener('click',(e)=>{

        if(e.target.matches(link))
        {   
            e.preventDefault();
            let id = e.target.id;
            
            $.ajax({
                    url: '/workspace/solicitudes/documentos/'+id,
                    type: 'get',
                    success: function (data) {
                        
                        let modal = d.querySelector("#modal-document");
                        modal.classList.remove('d-none');
                        modal.innerHTML = data;


                    }
                });

            
            
        }

        if(e.target.matches('#modal-document'))
            d.querySelector("#modal-document").classList.add('d-none');
        
        if(e.target.matches('#close-model-docs *') || e.target.matches('#close-model-docs'))
            d.querySelector("#modal-document").classList.add('d-none'); 

        if(e.target.matches('.modal-body-edit'))
        {
            if(d.querySelector('#navbarSupportedContent').classList.contains('show'))
            {   
                d.querySelector('#navbarSupportedContent').remove('show');;
                d.querySelector('.navbar-toggler').classList.add('collapsed');                
            }
        } 

        if(e.target.matches('.li-doc'))
        {

            let id = e.target.getAttribute('id-doc');
            call_document(id)

            if(d.querySelector('#navbarSupportedContent').classList.contains('show'))
            {   
                let nav = d.querySelector('#navbarSupportedContent');
                nav.classList.remove('show');
                d.querySelector('.navbar-toggler').classList.add('collapsed');
                
            }
        }     
    })
}



export function filter_request (request,button)
{
        d.addEventListener('click',e => {



            if(e.target.matches(button))
            {
                let action = e.target.getAttribute('id-action');

                filter_ajax(action);
            }

            e.stopPropagation();

        })
}

function filter_ajax(action)
{       
        let csrf = $('input[name="_token"]').attr('value'); 

        let datos = {'_token':csrf,'year': $("select[name='year']").val() };

        $.ajax({ 
       
        url:'/workspace/solicitudes/filter/'+action,
        type: 'POST', 
        dataType: 'json',
        data: datos,
        success:function(response){

            const r = response;

            console.log(r);

            $('#example').DataTable().clear().rows.add(r).draw();
                                    
    
        },
        error:function(error)
        {   
            console.log(error);
        }

         });
}



function call_document(id)
{
    let section = d.querySelector(`#doc-${id}`)

    if(section != null){
        let bodys = d.querySelectorAll('.body-doc');
        
        bodys.forEach( function(body)
        {   
            if(!body.classList.contains('d-none'))
                body.classList.replace('d-flex','d-none');
        });    

        section.classList.replace('d-none','d-flex');
    }
    
}