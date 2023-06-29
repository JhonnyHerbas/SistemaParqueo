<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar horario de trabajo";
include('templates/head.php');
include('../models/funcionAdmin.php')
    ?>

<body>
    <!-- Include del header.php -->
    <?php

    include('templates/header.php');
    if ($_SESSION['rol'] != "Administrador") {
        header('Location: visualizarSitio.php');
    }
    $id = $_GET['id_horario'];
    if ($horarios = visualizar_horario_id($id)) {
        $horario = $horarios->fetch_array(MYSQLI_BOTH);
    }
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
            <div class="card-header">
                <h3 class="font-weight-bold">Editar horario de trabajo</h3>
            </div>
            <div class="card-body">
                <form id="myForm" class="row g-3 needs-validation" novalidate
                    action="../controllers/editarHorarioTrabajoAction.php" method="post">
                    
                    <input type="hidden" value="<?php echo $id; ?>" name="id_horario"
                            style="display: none;">

                    <!-- <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Turno del horario:</label>
                        <input type="text" name="turno" class="form-control text" id="validationCustom01"
                            pattern="^(?=(.*[a-zA-Z]){3,})[a-zA-Z0-9ñ\s]{3,30}$" autocomplete="off" spellcheck="false" minlength="3"
                            maxlength="30" required value="<?= $horario['TURNO_HOR'];?>">
                        <div class="invalid-feedback text">
                            Por favor, ingrese un valor válido para este campo.
                        </div>
                    </div> -->

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Hora de ingreso:</label>
                        <input type="time" name="hora-apertura" class="form-control text" id="validationCustom01" pattern="^(0[6-9]|1[0-9]|2[0-3]):[0-5][0-9]$" autocomplete="off" spellcheck="false" 
                        minlength="8" maxlength="8" value="<?= $horario['INGRESO_HOR'];?>" required min="06:30" max="18:30">
                        <div class="invalid-feedback text" >
                            Por favor, ingrese una hora entre las 6:30 y las 18:30
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label text">Hora de salida:</label>
                        <input type="time" name="hora-cierre" class="form-control text" id="validationCustom01" pattern="^(0?[0-9]|1[0-9]|2[0-2]):[0-5][0-9]$" autocomplete="off" spellcheck="false" 
                        minlength="8" maxlength="8" value="<?= $horario['SALIDA_HOR'];?>" required min="10:30" max="22:30">
                    
                        <div class="invalid-feedback text" >
                            Por favor, ingrese una hora entre las 10:30 y las 22:30
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label text">Sueldo:</label>
                        <input type="number" name="sueldo" class="form-control text" id="validationCustom03"
                        autocomplete="off" spellcheck="false" min="1"
                        value="<?= $horario['SUELDO_HOR'];?>" required>
                        <div class="invalid-feedback text">
                            Ingrese un monto válido.
                        </div>
                    </div>
                    
                    <div class="col-12 button">
                        <button class="btn btn-success text" id="submitButton" data-toggle="modal"
                            data-target="#exampleModal">Guardar</button>
                        <a class="btn btn-danger text" href="./visualizarHorarioTrabajo.php">Cancelar</a>
                    </div>

                    <!-- Modal -->
                    <div class="container-modal">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        ¿Está seguro de guardar los cambios?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                            id="cancelButton">Cancelar</button>
                                        <button type="submit" class="btn btn-success"
                                            id="confirmButton">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
function validarHorario() {
  // Obtener los valores de ambos campos de entrada y convertirlos en objetos de fecha
  const horaApertura = document.getElementsByName("hora-apertura")[0];
  const horaCierre = document.getElementsByName("hora-cierre")[0];
  
  const apertura = new Date("2000-01-01T" + horaApertura.value + "Z");
  const cierre = new Date("2000-01-01T" + horaCierre.value + "Z");

  // Validar que el horario de apertura sea anterior al de cierre
  if (apertura >= cierre) {
    var miv="Error la hora de apertura debe ser mayor a la hora de cierre";
      horaCierre.setCustomValidity("errorr");
      document.getElementById("ci").innerHTML = miv;
      
  } else {
    if (cierre.getTime() - apertura.getTime() < 1 * 30 * 60 * 1000) {
        var miv="Error el tiempo de funcionamiento del parqueo es de 2 horas.";
       horaCierre.setCustomValidity("errorr");
       document.getElementById("ci").innerHTML = miv;
    }else{
    horaCierre.setCustomValidity("");}
  }
}
</script>
<script>
  const myForm = document.getElementById("myForm");
  myForm.addEventListener("submit", function(event) {
   event.preventDefault();
    validarHorario();
  });
  
</script>
    <!-- Include de los scripts.php -->
    <?php
    include('templates/scripts.php');
    ?>
    <script src="../../public/js/validacion.js"></script>
</body>

</html>