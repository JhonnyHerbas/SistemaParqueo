<?php 
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
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
    $mail->Subject = 'Atencion denegada a su reclamo';
    $mail->Body    = 'Estimado/a Docente,

    Queremos informarle que hemos revisado su reclamo detenidamente, pero lamentablemente no podemos aceptarlo en esta ocasión. Nos disculpamos sinceramente por cualquier inconveniente que esto pueda haber causado.
    
    Hemos tomado en consideración sus comentarios y preocupaciones, y hemos trabajado para mejorar nuestros servicios. Agradecemos su comprensión en este asunto.
    
    Si tiene alguna pregunta adicional o necesita más información, no dude en contactarnos. Estaremos encantados de asistirle en lo que podamos.
    
    Atentamente,
    Sistema Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    rechazar_reclamo($codigo);
    header("Location: ../views/visualizarReclamo.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>