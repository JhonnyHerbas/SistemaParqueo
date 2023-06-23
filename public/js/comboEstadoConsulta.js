$(document).ready(function () {
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    
    function cargar_consultas(send_dato) {
        $.ajax({
            type: "POST",
            url: "../../App/helpers/comboConsulta.php",
            data: send_dato,
            success: function (response) {
                const consultas = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(consultas);
                if (Object.keys(consultas).length === 0) {
                    templete += `<div class="mensaje"><p>No se encontraron resultados para el estado seleccionado: ${select.value}.</p></div>`;
                } else {
                    consultas.forEach(consultas => {                    
                        templete += `
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Consulta ${i}
                                </button>
                            </h2>
                            <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        Título: ${consultas.TITULO_REC} <br> 
                                        Nombre: ${consultas.NOMBRE_DOC} ${consultas.APELLIDO_DOC} <br> 
                                        Celular: ${consultas.CELULAR_DOC} <br> 
                                        Correo: ${consultas.CORREO_DOC} <br> 
                                        Estado: ${consultas.ESTADO_REC} <br> 
                                        Descripción: ${consultas.DESCRIPCION_REC ? consultas.DESCRIPCION_REC : ''} <br>
                                        Fecha: ${consultas.FECHA_REC}
                                    </div>
                                    ${
                                        consultas.ESTADO_REC === 'ESPERA'
                                          ? `
                                            <div class="acordion-btn w-50">    
                                                <div class="function verde">
                                                    <a href="./responderConsulta.php?consulta=${consultas.ID_REC}" class="fa-solid fa-clipboard-question blanco"></a>
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

    cargar_consultas(send_dato);

    select.addEventListener('change', function () {
        send_dato = {
            'ESTADO': select.value
        };
        cargar_consultas(send_dato);
    });

})