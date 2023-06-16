<?php 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpMailer/phpmailer/src/Exception.php';
require '../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include('../models/funcionReclamo.php');
include('../models/funcionDocente.php');
// Crea un objeto PHPMailer
$mail= new PHPMailer(true);
 // Configura el servidor SMTP de Gmail
 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 465;
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'ssl';

 // Configura las credenciales de Gmail
 $mail->Username = 'servicio.correo.exodus@gmail.com';
 $mail->Password = 'frmstpfizdzgjqei';

 $codigo = $_GET["codigo"];
 $result = visualizar_reclamo_id($codigo);
 $reclamo= $result->fetch_array(MYSQLI_BOTH);

 $docentes = visualizar_docente_id($reclamo['ID_DOC']);
 $docente= $docentes->fetch_array(MYSQLI_BOTH);

 $correo = $docente["CORREO_DOC"];

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
 $mail->addAddress($correo, $codigo);

 try {       
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Atencion exitosa a su reclamo';
    $mail->Body    = 'Estimado/a Docente,

    Queremos informarle que su reclamo ha sido atendido con éxito. Lamentamos profundamente los inconvenientes que haya experimentado y le ofrecemos nuestras más sinceras disculpas por cualquier molestia ocasionada.
    
    Hemos tomado medidas para resolver la situación y mejorar nuestros servicios. Valoramos su paciencia y comprensión durante este proceso.
    
    Si tiene alguna pregunta adicional, no dude en contactarnos. Estaremos encantados de asistirle.
    
    Atentamente,
    Sistema Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    atender_reclamo($codigo);
    header("Location: ../views/visualizarReclamo.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>