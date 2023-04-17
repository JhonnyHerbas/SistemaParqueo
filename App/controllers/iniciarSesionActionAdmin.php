<?php

require_once('../models/funcionDocente.php');

$codigo = $_POST["user"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = iniciar_sesion($codigo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_ADM'];
    if ($hash == $password) {
        echo "Contraseña correcta";
        echo $fila['NOMBRE_ADM']. " " . $fila['APELLIDO_ADM'];
    } else {
        echo "Algo salio mal";
        
    }

} else {
    echo "No existe el admin";
}
?>