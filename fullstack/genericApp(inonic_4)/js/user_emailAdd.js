$(buscar_email());
function buscar_email(email){
	$.ajax({
		url: 'php/search_emailAdd.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {email: email},
	})
	.done(function(result){
		$("#datosEmail").html(result);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#email', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_email(valor);
	}else{
		buscar_email();
	}
});
