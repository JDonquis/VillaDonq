






















const d = document;



export default function datatable_request (repeat = 0)
{

    

    if(repeat == 1)
        $('#example').DataTable().ajax.reload();
    else{

    var t = $('#example');
        
    t.DataTable({

        "order":[],
        "responsive": true,
        "language": {
              "emptyTable": "No hay solicitudes por responder."
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
            type: 'GET',
            dataSrc:'',

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
            {data:'photo',defaultContent:'No enviado'},
            {data:'rep_name'},
            {data:'rep_DNI'},
            {data:'rep_phone_number'},
            {data:function (row){


                let btns = ` 
                <button type='button' class='btn btn-primary btn-request' btn-action='add' status='${row['request_statu_id']}' id-request='${row['id']}' ${row['request_statu_id']!=3?'disabled':''} >Aceptar</button>
                <button type='button' class='btn btn-outline-danger btn-request' btn-action='delete' id-request='${row['id']}' ${ row['request_statu_id']!=3?'disabled':''}>Rechazar</button>`;
                return btns;
            }

                


            },

        ]

    })


    }
}



// <tr class="odd"><td colspan="4" class="dataTables_empty" valign="top">No hay solicitudes por responder.</td></tr>