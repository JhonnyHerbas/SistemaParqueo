<?php 
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

include('../models/funcionAdmin.php');
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
 $result = visualizar_sitio_compartido_id($codigo);
 $compartido= $result->fetch_array(MYSQLI_BOTH);

 $docentes = visualizar_docente_id($compartido['ID_TITULAR_COMP']);
 $docente= $docentes->fetch_array(MYSQLI_BOTH);

 $correo = $docente["CORREO_DOC"];

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
 $mail->addAddress($correo, $codigo);

 try {       
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Rechazo de solicitud de sitio compartido';
    $mail->Body    = 'Estimado/a Docente,
    Esperamos que este mensaje le encuentre bien. Nos dirigimos a usted para informarle que su solicitud realizada a través del sitio compartido, lamentablemente ha sido rechazada en el Sistema de Parqueo FCYT.
    
    Lamentamos cualquier inconveniente que esto pueda ocasionarle y comprendemos que pueda generar cierta frustración. Sin embargo, debido a ciertas circunstancias o criterios específicos, no hemos podido otorgar la aprobación solicitada en esta ocasión.
           
    Agradecemos su comprensión y le aseguramos que estamos trabajando constantemente para mejorar nuestros servicios y procesos. Si tiene alguna pregunta adicional o requiere más información, no dude en ponerse en contacto con nuestro equipo de atención al cliente, quienes estarán encantados de ayudarle.
    
    Atentamente,    
    Sistema de Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    rechazar_sitio_compartido($codigo);
    header("Location: ../views/visualizarSolicitudCompartido.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>