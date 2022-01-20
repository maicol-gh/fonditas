$('#tblFondas').DataTable({
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

$('#fondaForm').submit(function(event) {
    event.preventDefault();
    var self = this;

	var formData = new FormData();
    formData.append('form', $('#fondaForm').serialize());
    formData.append('create', 1);

    Swal.fire({ 
        title: "Atención!!",
        text: "¿Esta seguro de generar esta fonda?",
        type: "warning",
        showDenyButton: true,
        confirmButtonColor: "#16BA0A",
        confirmButtonText: "Si generar!",
        showLoaderOnConfirm: true
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.value) {
      	$.ajax({
            url: './controllers/controllerFondas.php?folder=fondas',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.toString().indexOf("Error:") === -1) {
                    //swal(data,"","success");
                    Swal.fire(data, '', 'success');
                    location.reload();
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

/*$( document ).ready(function() {
    console.log( "ready!" );
    $.ajax({
		type: "GET",
		url: "https://api.copomex.com/query/info_cp/09810?type=simplified&token=pruebas",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
	 	success: function (data) {
	 		//console.log(data);
	 		console.log(data.response);
	 		console.log(data.response.asentamiento);
	 		var colonias = '<option value="">Seleccione una opción</option>';
	  		$.each(data.response.asentamiento, function (i, item) {
	  			colonias += '<option value="'+item+'">'+item+'</option>';
	  		});
	  		//console.log(colonias);
	  		//$('#colonia').append(colonias);
	  		$('#colonia').append(colonias);
	  		$('#delegacion').val(data.response.municipio);
	  		$('#pais').val(data.response.pais);
	  		$('#estado').val(data.response.estado);
	  		$('#ciudad').val(data.response.ciudad);
	 	},
	 	failure: function (data) {
	  		alert(data.responseText);
	 	},
	 	error: function (data) {
	  		alert(data.responseText);
	 	}
	});
});*/

function validaNumero(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function countChars(){
	textocp = document.getElementById("cp").value;
	//console.log(textocp);
	numcp = textocp.length;
	//console.log(numcp);
	if (numcp == 5){
		$('#colonia').html('');
		setColonia(textocp);
	    //console.log(texto);
	}  
}

function setColonia(cp){
    $.ajax({
		type: "GET",
		url: "https://api.copomex.com/query/info_cp/"+cp+"?type=simplified&token=5cc030a0-80e8-4272-8e06-a9a0eb51a898",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
	 	success: function (data) {
	 		//console.log(data);
	 		//console.log(data.response);
	 		console.log(data.response.asentamiento);
	 		var colonias = '<option value="">Seleccione una opción</option>';
	  		$.each(data.response.asentamiento, function (i, item) {
	  			colonias += '<option value="'+item+'">'+item+'</option>';
	  		});
	  		//console.log(colonias);
	  		$('#colonia').append(colonias);
	  		$('#delegacion').val(data.response.municipio);
	  		$('#pais').val(data.response.pais);
	  		$('#estado').val(data.response.estado);
	  		$('#ciudad').val(data.response.ciudad);
	 	},
	 	failure: function (data) {
	  		alert(data.responseText);
	 	},
	 	error: function (data) {
	  		alert(data.responseText);
	 	}
	});
}

function setColonia2(cp,col){
	console.log(cp);
	console.log(col);
    $.ajax({
		type: "GET",
		url: "https://api.copomex.com/query/info_cp/"+cp+"?type=simplified&token=5cc030a0-80e8-4272-8e06-a9a0eb51a898",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
	 	success: function (data) {
	 		//console.log(data);
	 		//console.log(data.response);
	 		console.log(data.response.asentamiento);
	 		var colonias = '<option value="">Seleccione una opción</option>';
	  		$.each(data.response.asentamiento, function (i, item) {
	  			if (col == item) {
	  				colonias += '<option value="'+item+'" selected>'+item+'</option>';
	  			} else {
	  				colonias += '<option value="'+item+'">'+item+'</option>';
	  			}
	  		});
	  		//console.log(colonias);
	  		$('#colonia').append(colonias);
	  		$('#delegacion').val(data.response.municipio);
	  		$('#pais').val(data.response.pais);
	  		$('#estado').val(data.response.estado);
	  		$('#ciudad').val(data.response.ciudad);
	 	},
	 	failure: function (data) {
	  		alert(data.responseText);
	 	},
	 	error: function (data) {
	  		alert(data.responseText);
	 	}
	});
}

function deleteFonda(id){
    console.log(id);
    Swal.fire({ 
        title: "Atención!!",
        text: "¿Esta seguro de eliminar esta fonda?",
        type: "warning",
        showDenyButton: true,
        confirmButtonColor: "#16BA0A",
        confirmButtonText: "Si eliminar!",
        showLoaderOnConfirm: true
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.value) {
      	$.ajax({
	        url: './controllers/controllerFondas.php?delete=true&id='+id+'&folder=fondas',
	        type: 'POST',
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function (data) {
	            if (data.toString().indexOf("Error:") === -1) {
	                //swal(data,"","success");
	                Swal.fire(data, '', 'success');
	                location.reload();
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

function limpiaForm(){
	$('#nombre_fonda').val('');
	$('#calle').val('');
	$('#exterior').val('');
	$('#interior').val('');
	$('#cp').val('');
	//$('#colonia').val(fonda[0].colonia);
	$('#delegacion').val('');
	$('#ciudad').val('');
	$('#estado').val('');
	$('#pais').val('');
	$('#id_fonda').val('');
	$('#colonia').html('');
}

function getFonda(id){
	limpiaForm();
    $.ajax({
		url: './controllers/controllerFondas.php?get=true&id='+id+'&folder=fondas',
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
	 	success: function (data) {
	 		var fonda = JSON.parse(data);
	 		$('#nombre_fonda').val(fonda[0].nombre_fonda);
	 		$('#calle').val(fonda[0].calle);
	 		$('#exterior').val(fonda[0].exterior);
	 		$('#interior').val(fonda[0].interior);
	 		$('#cp').val(fonda[0].cp);
	 		//$('#colonia').val(fonda[0].colonia);
	 		$('#delegacion').val(fonda[0].delegacion);
	 		$('#ciudad').val(fonda[0].ciudad);
	 		$('#estado').val(fonda[0].estado);
	 		$('#pais').val(fonda[0].pais);
	 		$('#id_fonda').val(fonda[0].id_fonda);
	 		$('#colonia').html('');
	 		setColonia2(fonda[0].cp,fonda[0].colonia);
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



