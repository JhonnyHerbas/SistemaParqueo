$(document).ready(function () {
    let select = document.getElementById("fecha");
    let data = document.getElementById("data");

    function cargar_reportes(send_dato) {
        console.log("Contenido de select:", select);
        console.log("Contenido de send_dato:", send_dato);
        $.ajax({
            type: "POST",
            url: "../../App/helpers/comboEstadiaCliente.php",
            data: send_dato,
            success: function (response) {
                const reportes = JSON.parse(response);
                let templete = ``;
                let i = 1;
                let j = 1;
                console.log(reportes);
                reportes.forEach(reporte => {
                    templete += `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapse${i}">
                                
                                ${reporte.NOMBRE_DOC} ${reporte.APELLIDO_DOC} 
                            </button>
                        </h2>
                        <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-50">
                                    Hora de Entrada: ${reporte.FECHA_INGRESO_ACT} <br> 
                                    Hora de Salida: ${reporte.FECHA_SALIDA_ACT}<br> 
                                    Tiempo Transcurrido: ${reporte.TIEMPO_TRANSCURRIDO}<br>
                                </div>
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
        'fecha': select.value
    };

    cargar_reportes(send_dato);

    document.getElementById("buscar").addEventListener('click', function (event) {
        event.preventDefault(); // Evita la recarga de la página
        send_dato = {
            'fecha': select.value
        };
        cargar_reportes(send_dato);
    });
});