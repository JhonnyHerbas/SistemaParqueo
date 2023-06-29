<?php
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include('../models/funcionDocente.php');
include('../models/funcionAdmin.php');

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

$cod = $_GET['id'];

$compras = visualizar_compra_id($cod);
$compra = $compras->fetch_array(MYSQLI_BOTH);

$docentes = visualizar_docente_id($compra['ID_DOC']);
$docente = $docentes->fetch_array(MYSQLI_BOTH);

$codigo = $docente["ID_DOC"];
$correo = $docente["CORREO_DOC"];

$mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
$mail->addAddress($correo, $codigo);

try {
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Compra rechazada';
    $mail->Body    = 'Estimado/a Docente,

    Espero que se encuentre bien. Queremos informarle que su compra de parkcions ha sido rechazada debido a que no pudimos verificar su autenticidad. Si cree que ha habido algún error, le invitamos a que se comunique con nosotros para resolver cualquier problema.
    
    Agradecemos su atención.
    
    Atentamente,
    Sistema de Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();

    rechazar_moneda($_GET['id']);
    header("Location: ../views/visualizarCompraMoneda.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}

