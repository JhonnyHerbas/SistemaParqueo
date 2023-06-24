$(document).ready(function () {
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    
    function cargar_solicitudes(send_dato) {
        $.ajax({
            type: "POST",
            url: "../../App/helpers/comboCompartido.php",
            data: send_dato,
            success: function (response) {
                const compartidos = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(compartidos);
                if (Object.keys(compartidos).length === 0) {
                    templete += `<div class="mensaje"><p>No se encontraron resultados para el estado seleccionado: ${select.value}.</p></div>`;
                } else {
                    compartidos.forEach(compartidos => {                    
                        templete += `
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Solicitud ${i}
                                </button>
                            </h2>
                            <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        Docente titular: ${compartidos.NOMBRE_DOC} ${compartidos.APELLIDO_DOC}<br> 
                                        Correo: ${compartidos.CORREO_DOC} <br>
                                        Docente suplente: ${compartidos.NOMBRE_DOC2} ${compartidos.APELLIDO_DOC2}<br> 
                                        Correo: ${compartidos.CORREO_DOC2} <br>
                                        Sitio: ${compartidos.NOMBRE_SIT} <br> 
                                        Estado: ${compartidos.ESTADO_COMP} 
                                    </div>
                                    ${
                                        compartidos.ESTADO_COMP === 'ESPERA'
                                          ? `
                                            <div class="acordion-btn w-50">    
                                                <div class="function verde">
                                                    <a href="../controllers/aceptarSitioCompartido.php?codigo=${compartidos.ID_COMP}" class="fa-solid fa-square-check blanco"></a>
                                                </div>
                                                <div class="function rojo">
                                                    <a href="../controllers/rechazarSitioCompartido.php?codigo=${compartidos.ID_COMP}" target="_self" class="fa-solid fa-square-xmark blanco"></a>
                                                </div>
                                            </div>
                                          `
                                          : ''
                                      }
                                </div>
                            </div>
                        </div>            
                        `;
                        i++;
                    });
                }
                
                data.innerHTML = templete;
            }
        });
    }

    let send_dato = {
        'ESTADO': valorSeleccionado
    };

    cargar_solicitudes(send_dato);

    select.addEventListener('change', function () {
        send_dato = {
            'ESTADO': select.value
        };
        cargar_solicitudes(send_dato);
    });

})