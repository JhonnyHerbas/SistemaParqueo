<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../vendor/phpMailer/phpmailer/src/Exception.php';
require '../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

require_once('../models/funcionRecovery.php');

$correo = $_POST['email'];

$result = recuperar_correo($correo);
if ($result) {
    $fila = mysqli_fetch_array($result);
    if ($fila['correo'] == $correo) {
        $mail = new PHPMailer(true);

        try {
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
            $mail->addAddress('jhonnyherbasapaico@gmail.com', 'Recuperación');
            
            $mail->isHTML(true);
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'Hola, este es un correo generado para solicitar la recuperación de contraseña, por favor, <a href="localhost/SistemaParqueo/App/views/nuevaContrasena.php?id=' . $fila['id'] . '">Ingrese para recuperar su contraseña</a>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else {
    header("Location: ../views/recuperarContrasena.php?error=correo_inexistente");
}
?>