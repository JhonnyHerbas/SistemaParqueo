$(document).ready(function () {
    // Selecciona el formulario por su id
    $("#myForm").submit(function (event) {
        // Validar los campos del formulario
        if (this.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            // Si los campos son válidos, muestra el modal
            $('#exampleModal').modal('show');

            // Agrega evento de click al botón de confirmar en el modal
            $('#confirmButton').click(function(){
                // Envía el formulario al action definido en el atributo "action"
                $("#myForm").off('submit').submit();
            });
            // Agrega evento de click al botón de cancelar en el modal
            $('#cancelButton').click(function(){
                // Cierra el modal
                $('#exampleModal').modal('hide');
                // Restablece el valor del elemento select
                $('#validationCustom04').val('');
                // Quita la clase "was-validated" para eliminar los mensajes de validación
                $('#myForm').removeClass('was-validated');
            });
        }
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();

        // Agrega la clase "was-validated" para mostrar los mensajes de validación
        $(this).addClass("was-validated");
    });
});

  