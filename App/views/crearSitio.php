<!DOCTYPE html>
<html lang="en">

<?php

$title = "Crear sitio";
include('head.php');
    
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";
    $lista =    "<ul>
                    <li><a href=''>Inicio</a></li>
                    <li><a href=''>Visualizar</a></li>
                    <li><a href=''>Configurar horario</a></li>
                    <li><a href=''>Ver solicitudes</a></li>
                </ul>";

    include('header.php');
    include('../models/funcionSeccion.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <section class="container-form">
        <div class="card form">
        <div class="card-header">
                <h2 class="h2">Crear sitio</h2>
        </div>
            <div class="card-body">
              <form class="row g-3 needs-validation" novalidate id="formulario" action="../controllers/crearSitioAction.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="validationCustom01" class="form-label">Nombre de sitio: </label>
                  <input type="text" class="form-control" id="validationCustom01" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required 
                  name="name" maxlength="15" pattern="^[a-zA-Z0-9\s]*$" spellcheck="false" autocomplete="off"
                  >
                  <div class="invalid-feedback">
                            Por favor, ingrese un valor válido para este campo.
                  </div>
                </div>

                <div class="mb-3">
                  <label> Disponible : </label>
                  <select class="form-select bg-info" id="validationCustom04" name="disponible" id="disponible" required>
                    <option selected disabled value="">Elige...</option>
                    <option value="1" style="font-size: 20px;">Si</option>
                    <option value="0" style="font-size: 20px;">No</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Precio: </label>
                  <input type="number" class="form-control" id="validationCustom02" min="1" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="10" pattern="^[0-9]*$"   
                  >
                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
                        </div>
                </div>
                <div class="mb-3">
                  <label> Sección: </label>
                  <select name= "seccion" class="form-select bg-info" id="validationCustom04" required>
                    <option selected disabled value="">Elige...</option>
                        <?php
                        $result = visualizar_seccion();
                        if($result){
                            while($row = $result->fetch_array(MYSQLI_BOTH)){
                                $id = $row['ID_SEC'];
                                $nombre = $row['NOMBRE_SEC'];
                                echo "<option value='$id'>$nombre</option>";
                            }
                        } 
                        ?>
                   </select>
                </div>

                <div class="col-12 button">
                  <button id="btn" class="crear btn-success" type="submit" name="crear">Guardar</button></a>
      
                  <button id="cancelar" class="cancelar btn-danger" type = "reset" >Cancelar</button>
                </div>
      
              </form>
      
            </div>
    </div>
    </section>
    
    <!-- Include de los scripts.php -->
    <?php
    
    include('scripts.php');

    ?>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>
</html>