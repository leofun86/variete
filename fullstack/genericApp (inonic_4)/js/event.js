$(buscar_evento());
function buscar_evento(evento){
	$.ajax({
		url: 'php/search_event.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {evento: evento},
	})
	.done(function(resp){
		$("#datosEvent").html(resp);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#searchEvent', function(){
	var val = $(this).val();
	if (val != "" && val.length == 8) {
		buscar_evento(val);
	}else{
		buscar_evento();
	}
});
