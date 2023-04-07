$('#seccion').on('change', function () {
    var seccion = $(this).val(); // Obtener el valor seleccionado
    // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL
    $.ajax({
        url: '/SistemaParqueo/App/models/verSitios.php', // Archivo PHP que maneja la consulta SQL
        type: 'POST',
        data: { seccion: seccion }, // Enviar la categoría seleccionada como datos
        success: function (data) {
            $('#container-vista').html(data);
            let id_sec = seccion;
            let href = `eliminarSeccion.php?id_sec=${id_sec}`;
            $('#seccion-hidden').attr('href', href); // Mostrar los resultados en el div con id "resultado"
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

// var elements = document.getElementById("elements");
// var template = '<h2>Hola mundo</h2>'; // Definir la variable aquí para que esté disponible en todo el scope

// $('#seccion').on('change', function () {
//     var seccion = $(this).val();
//     $.ajax({
//         url: '/SistemaParqueo/App/models/verSitios.php',
//         type: 'POST',
//         data: { seccion: seccion },
//         success: function (data) {
//             $('#container-vista').html(data);

//             // Nueva petición AJAX para obtener la descripción
//             $.ajax({
//                 url: '/SistemaParqueo/App/models/obtenerSeccion.php',
//                 type: 'POST',
//                 data: { id_seccion: seccion }, // Enviar el ID de la sección seleccionada
//                 success: function (respuesta) {
//                     template = '<div class="container-descripcion">' +
//                         '<p>"${respuesta.DESCRIPCION_SEC}"</p>' +
//                         '</div>' +
//                         '<div class="function-seccion rojo">' +
//                         '<a href="eliminarSeccion.php?id_sec="${respuesta.ID_SEC}"" target="_self" class="fa-solid fa-trash blanco eliminar-seccion"></a>' +
//                         '</div>';
//                     elements.innerHTML=template;
//                 }
//             });
//         }
//     });
// });

$('#seccion').on('change', function () {
    var seccion = $(this).val(); // Obtener el valor seleccionado
    // Realizar solicitud AJAX a la página PHP que maneja la consulta SQL
    $.ajax({
        url: '/SistemaParqueo/App/models/obtenerDescripcion.php', // Archivo PHP que maneja la consulta SQL
        type: 'POST',
        data: { seccion: seccion }, // Enviar la categoría seleccionada como datos
        success: function (data) {
            $('#container-descripcion').html(data);
        }
    });
});