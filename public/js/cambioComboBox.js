$('#seccion').on('change', function () {
    var seccion = $(this).val(); // Obtener el valor seleccionado
    // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL
    $.ajax({
        url: '/SistemaParqueo/App/models/verSitios.php', // Archivo PHP que maneja la consulta SQL
        type: 'POST',
        data: { seccion: seccion }, // Enviar la categoría seleccionada como datos
        success: function (data) {
            $('#container-vista').html(data); // Mostrar los resultados en el div con id "resultado"
        }
    });
});

document.getElementById("seccion").addEventListener("change", function () {
    var select = document.getElementById("seccion");

    for (var i = 0; i < select.length; i++) {
        if (select[i].value === "todos") {
            select[i].remove();
        }
    }
});

// $('#buscar').on('click', function () {
//     var nombre = $('#nombre').val(); // Obtener el valor del input
//     // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL
//     if (nombre !== null) {
//         $.ajax({
//             url: '/SistemaParqueo/App/controllers/buscarSitio.php', // Ruta al archivo PHP que maneja la consulta SQL
//             type: 'POST',
//             data: { nombre: nombre }, // Enviar el valor del input como datos
//             success: function (data) {
//                 // Mostrar los resultados en un div con id "resultado"
//                 $('#container-vista').html(data);
//             }
//         });
//     }
// });