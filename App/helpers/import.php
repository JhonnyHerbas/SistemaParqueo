<?php
require_once('../config/conexion.php');
$fileContacts = $_FILES['fileContacts'];
$fileContacts = file_get_contents($fileContacts['tmp_name']);

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts);

// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) {
    $contactList[] = explode(",", $contact);
}
foreach ($contactList as $contactData) {
    $codigo  = $contactData[0];
    $nombre = ucfirst(strtolower($contactData[1]));
    $apellido = ucwords(strtolower($contactData[2]));
    $celular = $contactData[3];
    $correo = $contactData[4];
    $pass = generarPassword($nombre, $apellido, $celular) . "\n";
    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_DOCENTE_INSERTAR(?,?,?,?,?,?)");
    $stmt->bind_param("ississ", $codigo, $nombre, $apellido, $celular, $correo, $pass);
    $stmt->execute();
    $stmt->close();
}

function generarPassword($nombre, $apellido, $celular)
{
    $pass = substr($nombre, 0, 1) . substr($apellido, 0, 1) . $celular;
    return md5($pass);
}
?>
