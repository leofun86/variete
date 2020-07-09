$(buscar_ci());
function buscar_ci(ci){
	$.ajax({
		url: 'php/search_ciAdd.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {ci: ci},
	})
	.done(function(result){
		$("#datosCi").html(result);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#ci', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_ci(valor);
	}else{
		buscar_ci();
	}
});
