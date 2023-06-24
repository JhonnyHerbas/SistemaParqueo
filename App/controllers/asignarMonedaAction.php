<?php
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;

include('../models/funcionAdmin.php');
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include('../models/funcionDocente.php');

// Crea un objeto PHPMailer
$mail = new PHPMailer(true);
// Configura el servidor SMTP de Gmail
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

// Configura las credenciales de Gmail
$mail->Username = 'servicio.correo.exodus@gmail.com';
$mail->Password = 'frmstpfizdzgjqei';

$docente = $_POST["codigo"];
$cantidad =  $_POST['cantidad'];
$docentes = visualizar_docente_id($docente);
$docente = $docentes->fetch_array(MYSQLI_BOTH);

$codigo = $docente["ID_DOC"];
$correo = $docente["CORREO_DOC"];

// Configura el remitente y el destinatario del correo
$mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
$mail->addAddress($correo, $codigo);

try {
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Compra exitosa';
    $mail->Body    = 'Estimado/a Docente,

    Espero que se encuentre bien. Queremos informarle que su compra de la cantidad de ' . $cantidad . ' parkcions ha sido realizada con éxito.
    
    Agradecemos su atención.
    
    Atentamente,
    Sistema de Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();

    asignar_moneda($_POST['codigo'], $_POST['cantidad'], $_POST['id_com']);
    header("Location: ../views/visualizarCompraMoneda.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
