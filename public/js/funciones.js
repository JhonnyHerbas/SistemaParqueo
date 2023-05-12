$('#seccion').on('change', function () {
    var seccion = $(this).val(); // Obtener el valor seleccionado

    // Remover el elemento "todos" del select
    var select = document.getElementById("seccion");
    for (var i = 0; i < select.length; i++) {
        if (select[i].value === "todos") {
            select[i].remove();
        }
    }

    // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL de verSitios.php
    $.ajax({
        url: '../../App/helpers/verSitios.php',
        type: 'POST',
        data: { seccion: seccion },
        success: function (data) {
            $('#container-vista').html(data);
            let id_sec = seccion;
            let href = `eliminarSeccion.php?id_sec=${id_sec}`;
            $('#seccion-hidden').attr('href', href);
            href = `editarSeccion.php?id_sec=${id_sec}`;
            $('#editar-hidden').attr('href', href);
        }
    });

    // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL de obtenerDescripcion.php
    $.ajax({
        url: '../../App/models/obtenerDescripcion.php',
        type: 'POST',
        data: { seccion: seccion },
        success: function (data) {
            $('#container-descripcion').html(data);
        }
    });
});

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
            $('#confirmButton').click(function () {
                // Envía el formulario al action definido en el atributo "action"
                $("#myForm").off('submit').submit();
            });
            // Agrega evento de click al botón de cancelar en el modal
            $('#cancelButton').click(function () {
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

let menu = document.querySelector('#menu-bars');
let header = document.querySelector('header');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
}
window.onscroll = () => {
    menu.classList.remove('fa-times');
    header.classList.remove('active');
}

document.getElementById("login").addEventListener("submit", function (event) {
    // Verificar si hay errores en el formulario
    if (!this.checkValidity()) {
        // Evitar que el formulario se envíe si hay errores
        event.preventDefault();
        // Mostrar los mensajes de error
        this.classList.add('was-validated');
    }
});
