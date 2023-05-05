$(document).ready(function () {
    let select = document.getElementById("estado");
    let valorSeleccionado = select.value;
    let data = document.getElementById("data");
    function cargar_reportes(send_dato) {
        $.ajax({
            type: "POST",
            url: "/SistemaParqueo/App/helpers/comboReporteSemanal.php",
            data: send_dato,
            success: function (response) {
                const reportes = JSON.parse(response)
                let templete = ``;
                let i = 1;
                console.log(reportes)
                reportes.forEach(reportes => {
                    templete += `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                ${reportes.SEMANA}
                            </button>
                        </h2>
                        <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body body-sitio">
                                <div class="acordion-text w-50">
                                    Ingresos: ${reportes.TOTAL_FACTURA} PARCK <br> 
                                    Cantidad de sitios: ${reportes.TOTAL_SITIOS}<br> 
                                    Sitios nuevos: ${reportes.NUEVOS_SITIOS} <br>
                                </div>
                                <div class="acordion-btn w-50">    
                                    <div class="function verde">
                                        <a href="../controllers/reporteSemanalAction.php?anio=${reportes.ANIO}&mes=${reportes.NUM_MES}&mes_text=${reportes.MES}" class="fa-solid fa-print blanco" target="_blank"></a>
                                    </div>        
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