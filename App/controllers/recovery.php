<?php

use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require_once('../models/funcionRecovery.php');

$correo = $_POST['email'];
$token = mt_rand(100000, 999999);

$result = recuperar_correo($correo, $token);
if ($result) {
    if ($result['correo'] == $correo) {
        $mail = new PHPMailer(true);

        try {
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
            $mail->addAddress($correo, 'Recuperación');

            $mail->isHTML(true);
            $mail->Subject = 'Recupera tu contraseña';
            $mail->Body = 'Hola, este es un correo generado para solicitar la recuperación de contraseña, Por favor <br>
            <a href="http://exodusdevelopme.tis.cs.umss.edu.bo/App/views/nuevaContrasena.php?id=' . $result['id'] . '">Ingrese para recuperar su contraseña</a> <br>
            Su numero de codigo de seguridad es: ' . $token;

            $mail->send();
            header("Location: ../views/notificacionCorreo.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else {
    header("Location: ../views/recuperarContrasena.php?error=correo_inexistente");
}
