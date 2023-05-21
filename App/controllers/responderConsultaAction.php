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
 $mail->Port = 587;
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'tls';

 // Configura las credenciales de Gmail
 $mail->Username = 'servicio.correo.exodus@gmail.com';
 $mail->Password = 'frmstpfizdzgjqei';

 $reclamo = $_POST["id_rec"];
 $docente = $_POST["id_doc"];
 $respuesta = $_POST["respuesta"];

 $docentes = visualizar_docente_id($docente);
 $docente= $docentes->fetch_array(MYSQLI_BOTH);

 $codigo = $docente["ID_DOC"];
 $correo = $docente["CORREO_DOC"];

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
 $mail->addAddress($correo, $codigo);

 try {       
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Respuesta a su consulta';
    $mail->Body    = 'Estimado Docente,
    Espero que se encuentre bien. Respondiendo a su consulta.  '.$respuesta.' .
    
    Agradecemos su atención.
    
    Atentamente,
    Sistema Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    responder_reclamo($reclamo );
    header("Location: ../views/visualizarConsulta.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}

?>