<?php
include '../models/funcionSolicitud.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpMailer/phpmailer/src/Exception.php';
require '../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';


$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$correo = $_GET["correo"];

$sitio = $_GET["sitio"];
$accion = $_GET["accion"];
$id_sol = $_GET["id"];
echo $correo;

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

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Exodus');
 $mail->addAddress($correo, $nombre . ' ' . $apellido);

 if ($accion == 'aceptar') {
    try {
       
        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Respuesta de Solicitud de espacio';
        $mail->Body    = 'Con este correo para informarle que se le acepta la solicitud';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        //echo 'El correo electrónico se ha enviado correctamente.';
        
        solicitud($id_sol,$accion);
        //echo $correo;
        header("Location: ../views/modalSolicitud.php?accion=aceptar");
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
} else {
     try {
       // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Respuesta de Solicitud de espacio';
        $mail->Body    = 'Con este correo para informarle que se le rechaza la solicitud';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        solicitud($id_sol,$accion);
        header("Location: ../views/modalSolicitud.php?accion=rechazar");
       // echo 'El correo electrónico se ha enviado correctamente.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}
?>