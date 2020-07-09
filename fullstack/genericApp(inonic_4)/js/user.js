$(buscar_datos());
function buscar_datos(consulta){
	$.ajax({
		url: 'php/search_user.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#searchUser', function(){
	var valor = $(this).val();
	if (valor != "" && valor.length == 8) {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});
