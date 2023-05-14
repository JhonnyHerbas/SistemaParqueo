<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpMailer/phpmailer/src/Exception.php';
require '../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
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

 $codigo = $_GET["codigo"];
 $correo = $_GET["correo"];
 $tiempo = $_GET["tiempo"];

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
 $mail->addAddress($correo, $codigo);

 try {       
    // Configura el asunto y el cuerpo del correo
    $mail->Subject = 'Recordatorio de pago pendiente';
    $mail->Body    = 'Estimado Docente,
    Espero que se encuentre bien. Le escribo en relación a su sitio asiganado en nuestra empresa. Lamentablemente, hemos notado que su sitio se encuentra en mora de pago desde hace '.$tiempo.' meses.
    
    Le agradeceríamos mucho si pudiera realizar el pago de su deuda lo antes posible para evitar cualquier inconveniente futuro. Si ya realizó el pago, por favor, háganos saber para actualizar nuestros registros.
    
    Quiero reiterarle nuestro compromiso de ofrecerle un servicio de calidad y esperamos seguir contando con su confianza en el futuro.
    
    Si necesita alguna aclaración o tiene alguna consulta adicional, no dude en contactarnos.
    
    Agradecemos su atención y esperamos su respuesta.
    
    Atentamente,
    Sistema Parqueo FCYT';

    // Envía el correo electrónico y muestra un mensaje
    $mail->send();
    header("Location: ../views/visualizarClienteMora.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}

?>