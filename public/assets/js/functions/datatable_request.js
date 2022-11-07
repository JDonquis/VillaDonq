






















const d = document;



export default function datatable_request ()
{
	let all_request_tr = '';

    all_request_tr = document.createDocumentFragment();

    // if ( $.fn.dataTable.isDataTable( '#example' ) ) 
    //         d.querySelector('tbody').replaceChildren();
    




	$.ajax({
    type: 'GET',
    url: '/workspace/solicitudes/get',
    mimeType: 'json',
    success: function(data) {
        $.each(data, function(i, data) {

            const tr = document.createElement('tr')
            const columns = `
                <td class='dt-control' id='${i}'></td>
                <td class='column-edit' >${data.year}</td>
                <td class='column-edit' >${data.name}</td>
                <td class='column-edit' >${data.last_name}</td>
                <td class='column-edit' >${data.DNI}</td>
                <td class='column-edit' >${data.address}</td>
                <td class='column-edit' >${data.date_birth}</td>
                <td class='column-edit' >${data.age}</td>
                <td class='column-edit' >${data.cer_birth}</td>
                <td class='column-edit' >${data.report_card}</td>
                <td class='column-edit' >${data.cer_notes}</td>
                <td class='column-edit' >${data.cer_conduct}</td>
                <td class='column-edit' >${data.photo}</td>
                <td class='column-edit' >${data.rep_name}</td>
                <td class='column-edit' >${data.rep_DNI}</td>
                <td class='column-edit' >${data.rep_phone_number}</td>
                <td class='column-edit column-buttons' > <button type='button' class='btn btn-primary btn-request' btn-action='add' status='${data.request_statu_id}' id-request='${data.id}'>Aceptar</button><button type='button' class='btn btn-outline-danger btn-request' btn-action='delete' id-user='${data.request_statu_id}'>Rechazar</button></td>    
            `
            tr.innerHTML = columns;

            all_request_tr.appendChild(tr);
        });
        

        d.querySelector('tbody').replaceChildren(all_request_tr)
        /*DataTables instantiation.*/
        var table = $( "#example" ).DataTable({
            
        	"responsive": true,
            "retrieve": true,
           	"language": {
     		 "emptyTable": "No hay solicitudes por responder."
    		}
        });


    },
    error: function() {
        alert('Fail!');
    }
});



}


