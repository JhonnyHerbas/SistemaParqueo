<!DOCTYPE html>
<html lang="en">

<?php

$title = "Editar sitio";
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
    include('../models/funcionSitio.php');
    ?>

    <!-- Aqui vendra toda la interfaz que se necesita para la visualizacion -->
    <main>
        <div class="containerE">
            <div class="form-register">
              <form class="needs-validation" novalidate id="formulario" action="CrearSitio.php" method="post" enctype="multipart/form-data">
                <div class = "container-tituloE">
                    <h2 class="form-title" style="position: relative;">Editar Sitio</h2>   
                </div>
    
                <div class="blockE">
                  <label >Nombre de sitio: </label>
                  <input class="form-control bg-info" onkeyup = "this.value=this.value.replace(/^\s+/,'');" oninput="validarNombre(this)" 
                  required name="name" id="name" spellcheck="false" type="text" maxlength="15" 
                  autocomplete="off" style="font-size: 20px;" placeholder="<?php echo $nombre; ?>"
                  >
                  <?php
                  $consulta = "SELECT NOMBRE_SIT FROM SITIO WHERE ID_SIT = 1";
                  $resultado = mysqli_query($conexion, $consulta);
                  $fila = mysqli_fetch_array($resultado);
                  $nombre = $fila['NOMBRE_SIT'];
                  ?>
                  
                  <script>
                    function validarNombre(input){
                      var name = document.getElementById('name');
                      name.addEventListener('keypress', function(event) {
                      var key = event.keyCode;
                      // Restringir los caracteres especiales (33 a 47)
                      if (key >= 33 && key <= 47) {
                        event.preventDefault();
                      }
                      // Restringir los caracteres especiales (58 a 64)
                      if (key >= 58 && key <= 64) {
                        event.preventDefault();
                      }
                      // Restringir los caracteres especiales (91 a 96)
                      if (key >= 91 && key <= 96) {
                        event.preventDefault();
                      }
                      // Restringir los caracteres especiales (123 a 126)
                      if (key >= 123 && key <= 126) {
                        event.preventDefault();
                      }
                    });
                    }
                  </script>
                </div>

                <div class="blockE3">
                  <label>Precio: </label>
                  <input class="form-control bg-info" required name="precio" id="precio" spellcheck="false" type="text" maxlength="10" pattern="^[0-9]*$"
                  oninput="validarNumero(this)" title="Ingrese un número positivo" style="font-size: 20px;" autocomplete="off" placeholder="<?php echo $precio; ?>"
                  >
                  <?php
                  $consulta = "SELECT PRECIO_SIT FROM SITIO WHERE ID_SIT = 1";
                  $resultado = mysqli_query($conexion, $consulta);
                  $fila = mysqli_fetch_array($resultado);
                  $precio = $fila['PRECIO_SIT'];
                  ?>
                  <script>
                    function validarNumero(input) {
                      var precio = document.getElementById('precio');
                      precio.addEventListener('keypress', function(event) {
                      var key = event.keyCode;
                      if (key < 48 || key > 57) {
                        event.preventDefault();
                      }
                      }); 
                    }
                  </script>
                </div>
      
                <div class="botonesE">
                  <a href=""><button id="btn" class="editar" type="submit" name="crear">Editar</button></a>
      
                  <button id="cancelar" class="cancelarE" type = "reset" >Cancelar</button>
                </div>
      
              </form>
      
            </div>
    </div>
    </main>    

    <!-- Include de los scripts.php -->
    <?php
    
    include('scripts.php');

    ?>

</body>
</html>