
<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

require '../controllers/src/PHPMailer.php';
require '../controllers/src/Exception.php';
require '../controllers/src/SMTP.php';


$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$correo = $_GET["correo"];
$sitio = $_GET["sitio"];
$accion = $_GET["accion"];

if ($accion == 'aceptar') {
    // Crea un objeto PHPMailer
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
        $mail->addAddress($correo, $nombre . ' ' . $apellido);

        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Confirmación de aceptacion de Solicitud de espacio';
        $mail->Body    = 'Con este correo para informarle que se le acepta la solicitud';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        echo 'El correo electrónico se ha enviado correctamente.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
} else {
    // ... código para otro caso
    // Crea un objeto PHPMailer
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
        $mail->addAddress($correo, $nombre . ' ' . $apellido);

        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Correo de prueba';
        $mail->Body    = 'Este es un correo de prueba enviado desde PHP. Logre enviar correos automaticos att:Kevin senior en php';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        echo 'El correo electrónico se ha enviado correctamente.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}
?>