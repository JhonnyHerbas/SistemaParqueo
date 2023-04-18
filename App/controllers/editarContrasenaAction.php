<?php

require_once('../models/funcionAdmin.php');

$codigo = $_POST["id_doc"];
$pass = $_POST["pass"];
$hash = md5($pass);

$result = ver_contrasena($codigo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    $password = $fila['CONTRASENA_DOC'];
    if ($hash == $password) {
        $contrasenia = $_POST['passNuevo'];
        $verContrasenia = $_POST['verPassNuevo'];
        if ($contrasenia == $verContrasenia) {
            $hashNuevo = md5($contrasenia);
           editar_docente_contrasena($_POST['id_doc'], $hashNuevo);
           echo "Contraseña cambiada";
           exit();
        }
    } else {
        echo "Algo salio mal";
        
    }

} else {
    echo "Contrasea incorrecta";
}
?>