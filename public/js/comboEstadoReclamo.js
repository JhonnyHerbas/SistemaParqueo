$(document).ready(function () {
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    
    function cargar_reclamos(send_dato) {
        $.ajax({
            type: "POST",
            url: "../../App/helpers/comboReclamo.php",
            data: send_dato,
            success: function (response) {
                const reclamos = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(reclamos);
                if (Object.keys(reclamos).length === 0) {
                    templete += `<div class="mensaje"><p>No se encontraron resultados para el estado seleccionado: ${select.value}.</p></div>`;
                } else {
                    reclamos.forEach(reclamos => {                    
                        templete += `
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Reclamo ${i}
                                </button>
                            </h2>
                            <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        Título: ${reclamos.TITULO_REC} <br> 
                                        Nombre: ${reclamos.NOMBRE_DOC} ${reclamos.APELLIDO_DOC} <br> 
                                        Celular: ${reclamos.CELULAR_DOC} <br> 
                                        Correo: ${reclamos.CORREO_DOC} <br> 
                                        Estado: ${reclamos.ESTADO_REC} <br> 
                                        Descripción: ${reclamos.DESCRIPCION_REC ? reclamos.DESCRIPCION_REC : ''} <br>
                                        Fecha: ${reclamos.FECHA_REC}
                                    </div>
                                    ${
                                        reclamos.ESTADO_REC === 'ESPERA'
                                          ? `
                                            <div class="acordion-btn w-50">    
                                                <div class="function verde">
                                                    <a href="../controllers/atenderReclamoAction.php?codigo=${reclamos.ID_REC}" class="fa-solid fa-square-check blanco"></a>
                                                </div>
                                                <div class="function rojo">
                                                    <a href="../controllers/rechazarReclamoAction.php?codigo=${reclamos.ID_REC}" target="_self" class="fa-solid fa-square-xmark blanco"></a>
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

    cargar_reclamos(send_dato);

    select.addEventListener('change', function () {
        send_dato = {
            'ESTADO': select.value
        };
        cargar_reclamos(send_dato);
    });

})