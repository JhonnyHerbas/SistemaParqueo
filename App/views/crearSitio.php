<!DOCTYPE html>
<html lang="en">

<?php

$title = "Crear sitio";
include ('templates/head.php');
include ('../models/funcionSeccion.php');
?>

<body>
    <!-- Include del header.php -->
    <?php 
    
    $user = "Jhonny Herbas";
    $role = "Administrador";

    include('templates/header.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la creacion-->
    <section class="container-form">
    <div class="card form">
        <div class="card-header">
            <h2 class="h2">Crear sitio</h2>
        </div>
        <div class="card-body">
            <form id="myForm" class="row g-3 needs-validation" novalidate action="/SistemaParqueo/App/controllers/crearSitioAction.php" method="post">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Nombre del sitio:</label>
                    <input type="text" name="name" class="form-control bg-info" id="validationCustom01" pattern="^[a-zA-Z0-9\s]*$" autocomplete="off" spellcheck="false" 
                    minlength="5" maxlength="30" placeholder="Sitio X" onkeyup = "this.value=this.value.replace(/^\s+/,'');" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un valor válido para este campo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Disponible:</label>
                    <select class="form-select bg-info" name="disponible" id="validationCustom04" required>
                      <option selected disabled value="">Elige...</option>
                      <option value="1" style="font-size: 20px;">Si</option>
                      <option value="0" style="font-size: 20px;">No</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione una opción
                    </div>
                </div>
                <div class="mb-3">
                  <label for="validationCustom02" class="form-label">Precio: </label>
                  <input type="number" class="form-control bg-info" id="validationCustom02" min="1" autocomplete="off" 
                    required name="precio" spellcheck="false" maxlength="10" pattern="^[0-9]*$"   
                  >
                  <div class="invalid-feedback">
                            Solo se permiten valores positivos mayores a cero.
                  </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Sección:</label>
                    <select class="form-select bg-info" name="seccion" id="validationCustom04" required>
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
                    <div class="invalid-feedback">
                        Por favor seleccione una sección
                    </div>
                </div>
                <div class="col-12 button">
                    <button class="btn btn-success" id="submitButton" data-toggle="modal" data-target="#exampleModal">Guardar</button>
                    <a href="visualizarSitio.php" rel="noopener noreferrer"><button type="button" class="btn btn-secondary btn-danger" data-bs-dismiss="modal">Cancelar</button></a>
                </div>

        <!-- Modal -->
                <div class="container-modal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                ¿Está seguro de crear este sitio?
                            </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success" id="confirmButton">Confirmar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"id="cancelButton" >Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


    

    <!-- Include de los scripts.php -->
    <?php
    
    include('templates/scripts.php');

    ?>
    
    
<script src="/SistemaParqueo/public/js/validacion.js"></script>
</body>
</html>