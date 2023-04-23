$(document).ready(function(){
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    
    function cargar_solicitudes(send_dato){
        $.ajax({
            type: "POST",
            url: "/SistemaParqueo/App/helpers/comboSolicitudes.php",
            data: send_dato,
            success: function (response) {
                const solicitudes = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(solicitudes)
                solicitudes.forEach(solicitudes => {
                    templete += `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Solicitud ${i}
                            </button>
                        </h2>
                        <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Titulo: ${solicitudes.TITULO_SOL} <br> 
                                Nombre: ${solicitudes.NOMBRE_DOC} ${solicitudes.APELLIDO_DOC} <br> 
                                Celular: ${solicitudes.CELULAR_DOC} <br> 
                                Correo: ${solicitudes.CORREO_DOC} <br> 
                                Estado: ${solicitudes.ESTADO_SOL} <br> 
                                Descripción: ${solicitudes.DESCRIPCION_SOL ? solicitudes.DESCRIPCION_SOL : ''} <br> 
                                Numero de sitio: #${solicitudes.SITIO_SOL} <br>
                                Fecha solicitud: ${solicitudes.FECHA_SOL}
                            </div> 
                        </div>
                    </div>            
                    `;
                    i++;
                });
                data.innerHTML = templete;
            }
        });
    }

    let send_dato = {
        'ESTADO' : valorSeleccionado
    };
      
    cargar_solicitudes(send_dato);
      
      select.addEventListener('change', function() {
        send_dato = {
          'ESTADO': select.value
        };
        cargar_solicitudes(send_dato);
      });
      
})