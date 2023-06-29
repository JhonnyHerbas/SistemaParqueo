$(document).ready(function () {
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");

    function cargar_compras(send_dato) {
        $.ajax({
            type: "POST",
            url: "../../App/helpers/comboCompra.php",
            data: send_dato,
            success: function (response) {
                const compras = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(compras);
                if (Object.keys(compras).length === 0) {
                    templete += `<div class="mensaje"><p>No se encontraron resultados para el estado seleccionado: ${select.value}.</p></div>`;
                } else {
                    compras.forEach(compras => {                    
                        templete += `
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Compra de moneda ${i}
                                </button>
                            </h2>
                            <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        Codigo SIS: ${compras.ID_DOC} <br> 
                                        Nombre: ${compras.NOMBRE_DOC} ${compras.APELLIDO_DOC} <br> 
                                        Celular: ${compras.CELULAR_DOC} <br> 
                                        Correo: ${compras.CORREO_DOC} <br> 
                                        Estado: ${compras.ESTADO_COM} <br> 
                                        Monto: ${compras.MONTO_COM} PARCK <br>
                                        <button type="button" class="btn btn-secondary text" data-bs-toggle="modal" data-bs-target="#exampleModal${i}">Ver comprobante</button>

                                        <div class="modal fade" id="exampleModal${i}" tabindex="-1" aria-labelledby="exampleModalLabel${i}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content modal-comprobante">
                                                    <img src="../controllers/img/${compras.RUTA_COM}" alt="Comprobante" class="comprobante">
                                                </div>
                                            </div>
                                        </div>      
                                </div>
                                    ${
                                        compras.ESTADO_COM === 'ESPERA'
                                          ? `
                                            <div class="acordion-btn w-50">    
                                                <div class="function verde" title="Asignar monedas">
                                                    <a href="asignarMoneda.php?id=${compras.ID_COM}" class="fa-solid fa-square-check blanco"></a>
                                                </div>
                                                <div class="function rojo" title="Rechazar compra">
                                                    <a href="../controllers/rechazarMonedaAction.php?id=${compras.ID_COM}" target="_self" class="fa-solid fa-square-xmark blanco"></a>
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

    cargar_compras(send_dato);

    select.addEventListener('change', function () {
        send_dato = {
            'ESTADO': select.value
        };
        cargar_compras(send_dato);
    });

})