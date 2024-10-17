$('#formEdit').submit(function(e) {
    e.preventDefault();
    // Configurar el token CSRF una vez, fuera del evento submit
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type: 'POST',
        url: '../../roles-permisos/'+$('input[name="id"]').val(),
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {

            Swal.fire({
                title: response,
                text: "¿Quieres seguir editando el ROL?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Mantener editando!",
                cancelButtonText: "Finalizado!"
              }).then((result) => {
                if (!result.isConfirmed) {
                  window.location.href = "../../roles-permisos";
                }
              });
        },
        error: function(xhr) {
            var errorContainer = $('.print-error-msg');
            var errorList = errorContainer.find("ul");
            
            errorList.empty();
            errorContainer.show();
            
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                    errorList.append('<li>' + value + '</li>');
                });
            } else {
                errorList.append('<li>Ha ocurrido un error. Por favor, inténtalo de nuevo.</li>');
            }
        }
    });
});
