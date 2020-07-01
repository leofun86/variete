const btnSubmit = document.querySelector("#btnFin");
const result = document.querySelector('#datosAgend');
const user = document.querySelector('#userAgend');

btnSubmit.disabled = true;

$(buscar_datos());
function buscar_datos(consulta){
	$.ajax({
		url: 'php/search2.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosAgend").html(respuesta);
		if (respuesta === "El usuario existe") {
			result.style.color="green";
			btnSubmit.disabled=false;
		} else if (respuesta ==="") {
			result.style.color="red";
		}
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#userAgend', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});
