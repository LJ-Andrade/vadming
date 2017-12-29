
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 

/*
|--------------------------------------------------------------------------
| LISTS
|--------------------------------------------------------------------------
*/

// Set List Action Buttons
$(document).on("click", ".row-checkbox", function(e){
    e.stopPropagation();

	var selectedRows = [];
    $(".row-checkbox:checked").each(function() {          
        selectedRows.push($(this).attr('data-id'));
		$('#RowsToDeletion').val(selectedRows);
    });
       
    if(selectedRows.length == 1){
        $('#EditId').val(selectedRows);
    } else if(selectedRows.length < 1){
        $('#EditId').val('');
    } else if(selectedRows.length > 1){
        $('#EditId').val('');
    } else {
        $('#EditId').val('');
    }

    showButtons(this);

	var checkbox = $(this).prop('checked');
	if(checkbox){
		$(this).parent().parent().parent().addClass('row-selected');
	} else {
		$(this).parent().parent().parent().removeClass('row-selected');
	}
});

function showButtons(trigger) {
	
	var countSelected = $('input:checkbox:checked').length;

	if(countSelected == 1) {
        $('#DeleteBtn').removeClass('Hidden');
        $('#EditBtn').removeClass('Hidden');
	} else if(countSelected >= 2) {
        $('#EditBtn').addClass('Hidden');
    } else if(countSelected == 0) {
        $('#DeleteBtn').addClass('Hidden');
        $('#EditBtn').addClass('Hidden');
    }

}

/*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/

deleteRecord = function(id, route, bigtext, smalltext) {
	
	swal({
		title: bigtext,
		text: smalltext,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ELIMINAR',
		cancelButtonText: 'Cancelar',
		confirmButtonClass: 'btn btnGreen',
		cancelButtonClass: 'btn btnRed',
		buttonsStyling: false
	}).then(function () {

 		$.ajax({
			url: route,
			method: 'POST',             
			dataType: 'JSON',
			data: { id: id },
			beforeSend: function(){
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function(data){
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					$('#Id'+id).hide(200);
					for(i=0; i < id.length ; i++){
						$('#Id'+id[i]).hide(200);
					}
					alert_ok('Ok!','Eliminación completa');
					console.log(data);
					return true;
				} else {
					alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					console.log(data);
					return false;
				}
			},
			error: function(data)
			{
                $('#Error').html(data.responseText);
				console.log(data);	
			},
			complete: function()
			{
				// $('#Main-Loader').addClass('Hidden');
			}
		});
	});

}

deleteAndReload = function(id, route, bigtext, smalltext) {
	
	swal({
		title: bigtext,
		text: smalltext,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ELIMINAR',
		cancelButtonText: 'Cancelar',
		confirmButtonClass: 'btn btnGreen',
		cancelButtonClass: 'btn btnRed',
		buttonsStyling: false
	}).then(function () {
		$.ajax({
			url: route,
			method: 'POST',             
			dataType: 'JSON',
			data: { id: id },
			beforeSend: function(){
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function(data){
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					// alert_ok('Ok!','Eliminación completa');
					location.reload();
				} else {
					alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					return false;
				}
			},
			error: function(data)
			{
				$('#Error').html(data.responseText);
				console.log(data);	
			}
		});
	});

}




/*
|--------------------------------------------------------------------------
| ALERTS
|--------------------------------------------------------------------------
*/

function alert_ok(bigtext, smalltext){
    swal(
        bigtext,
        smalltext,
        'success'
    );    
}
    
function alert_error(bigtext, smalltext){

    swal(
        bigtext,
        smalltext,
        'error'
    );
    
}

function alert_info(bigtext, smalltext){

    swal({
            title: bigtext,
        type: 'info',
        html: smalltext,
        showCloseButton: true,
        showCancelButton: false,
        confirmButtonText:
            '<i class="ion-checkmark-round"></i> Ok!'
        });
}
