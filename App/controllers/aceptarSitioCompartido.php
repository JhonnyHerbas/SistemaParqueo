<?php 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpMailer/phpmailer/src/Exception.php';
require '../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
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
    $mail->Subject = 'Acpetacion de solicitud de sitio compartido';
    $mail->Body    = 'Estimado/a Docente,

    Esperamos que este mensaje le encuentre bien. Nos complace informarle que su solicitud realizada a través del sitio compartido ha sido aceptada exitosamente en el Sistema de Parqueo FCYT.
    
    Agradecemos su interés y cooperación en cumplir con los requisitos establecidos para la solicitud. Hemos revisado cuidadosamente su solicitud y hemos determinado que cumple con los criterios necesarios para su aprobación.
    
    Nos complace poder brindarle este servicio y esperamos que sea de utilidad para facilitar sus actividades dentro de nuestras instalaciones. Si tiene alguna pregunta adicional o requiere más información, no dude en ponerse en contacto con nuestro equipo de atención al cliente, quienes estarán encantados de asistirle en todo lo que necesite.
    
    Agradecemos su confianza en nuestro Sistema de Parqueo FCYT y nos comprometemos a seguir mejorando nuestros servicios para brindarle la mejor experiencia posible.
    
    Atentamente,
    Sistema de Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    aceptar_sitio_compartido($codigo);
    header("Location: ../views/visualizarSolicitudCompartido.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>