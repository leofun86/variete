jQuery(document).on('submit', '#form_lg', function(event) {
  event.preventDefault();

  jQuery.ajax({
    url:'main_app/login.php',
    type: 'POST',
    dataType: 'json',
    data: $(this).serialize(),
    beforeSend: () => $('#btn_lg').val('Validando...')
  })
  .done(function(respuesta) {
    console.log(respuesta);

    if (!respuesta.error) {
      if (respuesta.tipo == 'Admin') { location.href = 'main_app/resultado.php?tipo=admin'; }
      else if (respuesta.tipo == 'Usuario') { location.href = 'main_app/resultado.php?tipo=usuario'; }
    } else {
      $('.error').slideDown('slow');
      setTimeout(()=>{ $('.error').slideUp('slow'); }, 3000);
      $('.btn_lg').val('Iniciar Sesión');
    }
  })
  .fail(function(error) {
    console.log(error.responseText);

  })
  .always(function() {
    console.log('Complete');
  });
});
