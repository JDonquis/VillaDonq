






















const d = document;

var csrf = $('input[name="_token"]').attr('value');




export default function datatable_request (repeat = 0)
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
        },

         ],
        "ajax":{

            url: '/workspace/solicitudes/get',
            type: 'POST',
            dataSrc:function(json){
                console.log(json);
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
            {data:'address'},
            {data:'date_birth'},
            {data:'age'},
            {data:'cer_birth',defaultContent:'No enviado'},
            {data:'report_card',defaultContent:'No enviado'},
            {data:'cer_notes',defaultContent:'No enviado'},
            {data:'cer_conduct',defaultContent:'No enviado'},
            {data:function(row)
            { 
                let documents = row['type_documents'];

                if(!documents.length)
                    return null;    

                let doc_name = documents[0].pivot.name;
                return "<a href='/workspace/solicitudes/documentos/"+documents+"' target='_blank'>Ver documento</a>";

                


            },defaultContent:'No enviado'},
            
            {data:'rep_name'},
            {data:'rep_DNI'},
            {data:'rep_phone_number'},
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



