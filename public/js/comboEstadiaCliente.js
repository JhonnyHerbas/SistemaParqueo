$(document).ready(function () {
    let select = document.getElementById("fecha");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    function cargar_reportes(send_dato) {
       
        $.ajax({
            type: "POST",
            url: "/SistemaParqueo/App/helpers/comboEstadiaCliente.php",
            data: send_dato,
            success: function (response) {
                const reportes = JSON.parse(response)
                let templete = ``;
                let i = 1;
                let j= 1;
                console.log(reportes)
                reportes.forEach(reportes => {
                    templete += `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                             
                                ${reportes.NOMBRE_CLI} 
                            </button>
                        </h2>
                        <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-50">
                                    Entrada: ${reportes.FECHA_ENTRADA} <br> 
                                    Salida: ${reportes.FECHA_SALIDA}<br> 
                                    
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
        semanaAnterior = reportes.semana;
    }
    let semanaAnterior = null;
    let send_dato = {
        'ANIO': valorSeleccionado
    };

    cargar_reportes(send_dato);

    select.addEventListener('change', function () {
        send_dato = {
            'ANIO': select.value
        };
        cargar_reportes(send_dato);
    });

})