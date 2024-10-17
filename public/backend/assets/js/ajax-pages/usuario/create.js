$('#formCreate').submit(function(e) {
    e.preventDefault();
    
    // Configurar el token CSRF una vez, fuera del evento submit
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type: 'POST',
        url: '../gestion-usuario',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Usuario",
                text: response,
                showConfirmButton: false,
                timer: 1500
            });
            $('#formCreate')[0].reset();
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
