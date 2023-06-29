$(document).ready(function () {
  console.log("Hola mundo");

  function cargar_solicitudes() {
    $.ajax({
      type: "GET",
      url: "../../App/helpers/liberarSitio.php",
      success: function (response) {
        const desocupars = JSON.parse(response);
        let templete = ``;
        let i = 1;
        console.log(desocupars);
        if (Object.keys(desocupars).length === 0) {
          templete += `<div class="mensaje"><p>No se encontraron solicitudes de desocupacion de sitio</p></div>`;
        } else {
          desocupars.forEach((desocupar) => {
            templete += `
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed titulo-acordion" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse${i}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Sitio# ${desocupar.NOMBRE_SIT}
                                </button>
                            </h2>
                            <div id="flush-collapse${i}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body body-sitio">
                                    <div class="acordion-text w-50">
                                        Docente: ${desocupar.NOMBRE_DOC} ${desocupar.APELLIDO_DOC}<br> 
                                        Celular: ${desocupar.CELULAR_DOC} <br>
                                        Correo: ${desocupar.CORREO_DOC} <br>
                                    </div>
                                    <div class="acordion-btn w-50">    
                                        <div class="function verde" title="Aceptar solicitud">
                                            <a href="../controllers/aceptarDesocupacion.php?codigo=${desocupar.ID_SIT}&doc=${desocupar.ID_DOC}" class="fa-solid fa-square-check blanco"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        `;
            i++;
          });
        }

        $("#data").html(templete);
      },
    });
  }

  cargar_solicitudes();
});
