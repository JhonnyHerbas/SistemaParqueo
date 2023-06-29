<?php
include '../models/funcionDocente.php';

use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

$cod = $_POST['codigo'];
$result = visualizar_docente_id($cod);
$row = $result->fetch_array(MYSQLI_BOTH);

if ($row['PARK_COIN_DOC'] >= $_POST['precio']) {
    // Crea un objeto PHPMailer
    $mail = new PHPMailer(true);
    // Configura el servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    // Configura las credenciales de Gmail
    $mail->Username = 'servicio.correo.exodus@gmail.com';
    $mail->Password = 'frmstpfizdzgjqei';

    $correo = $row["CORREO_DOC"];

    // Configura el remitente y el destinatario del correo
    $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
    $mail->addAddress($correo, $cod);

    try {
        // Configura el asunto y el cuerpo del correo
        $mail->Subject = ' Confirmacion de pago exitoso del sitio';
        $mail->Body    = 'Estimado/a Docente,

        Esperamos que este mensaje le encuentre bien. Nos complace informarle que su pago por su sitio ha sido procesado exitosamente.
        
        Si tiene alguna pregunta o requiere más información, no dude en ponerse en contacto con nosotros.
        
        Atentamente,
        Sistema de Parqueo FCYT';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        realizar_pago($_POST['id-asi'], $_POST['precio'], $_POST['nombreDocente'], $_POST['codigo']);
        $mensaje = "Su pago se realizo exitosamente.";
        $titulo = "Pago exitoso";
        $boton = "btn-success";
        $link = "./visualizarPagos.php";
        include('../views/modalAceptacion.php');
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
} else {
    $mensaje = "No tienes suficientes monedas para realizar este pago. Por favor, recarga tu saldo.";
    $titulo = "Error al realizar el pago";
    $boton = "btn-danger";
    $link = "./visualizarPagos.php";
    include('../views/modalAceptacion.php');
}
