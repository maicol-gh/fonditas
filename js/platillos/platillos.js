$('#tblPlatillos').DataTable({
	language: {
        "sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered":   "(total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		}
    },
    responsive: true,
    autoWidth: false
});

$('#platilloForm').submit(function(event) {
    event.preventDefault();
    var self = this;

	var formData = new FormData();
    formData.append('form', $('#platilloForm').serialize());
    formData.append('create', 1);

    Swal.fire({ 
        title: "Atención!!",
        text: "¿Esta seguro de generar este platillo?",
        type: "warning",
        showDenyButton: true,
        confirmButtonColor: "#16BA0A",
        confirmButtonText: "Si generar!",
        showLoaderOnConfirm: true
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.value) {
      	$.ajax({
            url: './controllers/controllerPlatillos.php?folder=platillos',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.toString().indexOf("Error:") === -1) {
                    //swal(data,"","success");
                    Swal.fire(data, '', 'success');
                    //location.reload();
                    //window.location.href ="./index.php?page=fondas&folder=fondas";
                } else {
                    // swal(data,'','error');
                    // $("#mensajes").html(data);
                    Swal.fire({
					  icon: 'success',
					  title: 'Hubo un error al almacenar el registro',
					  text: data,
					  showConfirmButton: false,
					  timer: 5000
					  //location.reload();
					});
                }
                //finalizar();
            },
            error: function (data) {
                console.log("Error al enviar");
            },
            complete: function () {
            }
        });
        //alert('OK');
      }
    })
});

function deletePlatillo(id){
    console.log(id);
    Swal.fire({ 
        title: "Atención!!",
        text: "¿Esta seguro de eliminar este platillo?",
        type: "warning",
        showDenyButton: true,
        confirmButtonColor: "#16BA0A",
        confirmButtonText: "Si eliminar!",
        showLoaderOnConfirm: true
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.value) {
      	$.ajax({
	        url: './controllers/controllerPlatillos.php?delete=true&id='+id+'&folder=platillos',
	        type: 'POST',
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function (data) {
	            if (data.toString().indexOf("Error:") === -1) {
	                //swal(data,"","success");
	                Swal.fire(data, '', 'success');
	                //location.reload();
	            } else {
	                // swal(data,'','error');
	                // $("#mensajes").html(data);
	                Swal.fire(data, '', 'error');
	            }
	            //finalizar();
	        },
	        error: function (data) {
	            console.log("Error al enviar");
	        },
	        complete: function () {
	        }
	    });
      }
    })
}

function limpiaFormPlatillo(){
	$('#nombre').val('');
	$('#descripcion').val('');
	$('#ingredientes').val('');
	$('#costo').val('');
	$('#id_platillo').val('');
	$('#id_fonda').val('');
}

function getPlatillo(id){
	limpiaFormPlatillo();
	console.log(id);
    $.ajax({
		url: './controllers/controllerPlatillos.php?get=true&id='+id+'&folder=platillos',
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
	 	success: function (data) {
	 		var platillo = JSON.parse(data);
	 		$('#nombre').val(platillo[0].nombre);
	 		$('#descripcion').val(platillo[0].descripcion);
	 		$('#ingredientes').val(platillo[0].ingredientes);
	 		$('#costo').val(platillo[0].costo);
	 		$('#id_platillo').val(platillo[0].id_platillo);
	 		$('#id_fonda').val(platillo[0].id_fonda);
	 		//setColonia2(fonda[0].cp,fonda[0].colonia);
	 		//console.log(data);
	 		//console.log(data.response);
	 		//console.log(fonda[0].calle);
	 		//var colonias = '<option value="">Seleccione una opción</option>';
	  		//$.each(data.response.asentamiento, function (i, item) {
	  		//	colonias += '<option value="'+item+'">'+item+'</option>';
	  		//});
	  		//console.log(colonias);
	  		//$('#colonia').append(colonias);
	 	},
	 	failure: function (data) {
	  		alert(data.responseText);
	 	},
	 	error: function (data) {
	  		alert(data.responseText);
	 	}
	});
}



