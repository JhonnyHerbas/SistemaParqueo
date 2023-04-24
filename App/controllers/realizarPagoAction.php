<?php
include '../models/funcionAdmin.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

require '../controllers/src/PHPMailer.php';
require '../controllers/src/Exception.php';
require '../controllers/src/SMTP.php';


$nombreS = $_POST["nombreSitio"];
$precio = $_POST["precio"];
$nombreD = $_POST["nombreDocente"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$fechaFin = $POST["fecha"];

 // Crea un objeto PHPMailer
 $mail = new PHPMailer(true);
 // Configura el servidor SMTP de Gmail
 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'tls';

 // Configura las credenciales de Gmail
 $mail->Username = 'servicio.correo.exodus@gmail.com';
 $mail->Password = 'frmstpfizdzgjqei';

 // Configura el remitente y el destinatario del correo
 $mail->setFrom('servicio.correo.exodus@gmail.com', 'Exodus');
 $mail->addAddress($correo, $nombreD . ' ' . $apellido);

 if ($accion == 'aceptar') {
    try {
       
        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Factura de pago';
        $mail->Body    = 'Con este correo para informarle que su pago fue realizado correctamente';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        //echo 'El correo electrónico se ha enviado correctamente.';
        
        pago($id_sol,$accion);
    
        header("Location: /SistemaParqueo/App/views/modalSolicitud.php?accion=aceptar");
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
} else {
     try {
       // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Fcatura de pago';
        $mail->Body    = 'Con este correo para informarle que se cancelo el pago';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        pago($id_sol,$accion);
        header("Location: /SistemaParqueo/App/views/modalSolicitud.php?accion=rechazar");
       // echo 'El correo electrónico se ha enviado correctamente.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}
?>