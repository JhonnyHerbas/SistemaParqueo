<?php
include('../models/funcionDocente.php');
include('../models/funcionSitio.php');

use phpmailer\phpmailer\Exception;
use phpmailer\phpmailer\SMTP;
use phpmailer\phpmailer\PHPMailer;
//require_once 'vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

$sitio = $_GET['codigo'];
$docente = $_GET['doc'];

$result = visualizar_pagos($docente);
$row = $result->fetch_array(MYSQLI_BOTH);
$fecha = new DateTime($row['FECHA_INICIO_ASI']);
$fecha_actual = new DateTime($row['FECHA_ACTUAL']);
$can = $row['CANT'];

$interval = $fecha->diff($fecha_actual);
$meses = $interval->format('%m');
$i = 1;

$resta = $meses + 1 - $can;

$docentes = visualizar_docente_id($docente);
$docente = $docentes->fetch_array(MYSQLI_BOTH);
$correo = $docente["CORREO_DOC"];

$sitios = visualizar_sitio_id($sitio);
$sit = $sitios->fetch_array(MYSQLI_BOTH);
$numero_sit = $sit["NOMBRE_SIT"];

if (empty($row['FECHA_INICIO_ASI'])) {
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
    $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
    $mail->addAddress($correo, $docente);

    try {
        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Aprobacion exitosa de su solicitud de desocupación del sitio ' . $numero_sit . '';
        $mail->Body    = 'Estimado/a Docente,
 
         Esperamos que se encuentre bien. Nos complace informarle que su solicitud de desocupación del sitio ' . $numero_sit . ' ha sido aceptada exitosamente.
         
         Atentamente,
         Sistema de Parqueo FCYT';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        aceptar_liberar_sitio($sitio);
        $mensaje = "La solicitud ha sido aceptada satisfactoriamente y se le ha notificado al docente.";
        $titulo = "Solicitud aceptada exitosamente";
        $boton = "btn-success";
        $link = "./visualizarSolicitudesLiberarSitio.php";
        include('../views/modalAceptacion.php');
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
} else {
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
    $mail->setFrom('servicio.correo.exodus@gmail.com', 'Sistema de parqueo FCYT');
    $mail->addAddress($correo, $docente);

    try {
        // Configura el asunto y el cuerpo del correo
        $mail->Subject = 'Rechazo de solicitud de desocupacion del sitio de estacionamiento';
        $mail->Body    = 'Estimado/a Docente,

        Esperamos que se encuentre bien. Lamentamos informarle que su solicitud de desocupación del sitio de estacionamiento número ' . $numero_sit . ' ha sido rechazada debido a la cantidad pendiente de ' . $resta . ' meses en sus pagos.
        
        Le recordamos la importancia de mantener al día sus obligaciones de pago para garantizar un adecuado funcionamiento del Sistema de Parqueo de la FCYT y asegurar la disponibilidad de los espacios para todos los usuarios.
        
        Le animamos a solucionar los pagos pendientes a la brevedad posible y, una vez regularizada su situación, podrá volver a solicitar la desocupación del sitio de estacionamiento.
        
        Si tiene alguna pregunta o necesita asistencia adicional, no dude en ponerse en contacto con nuestro equipo de soporte. Estaremos encantados de ayudarlo en todo lo que podamos.
        
        Agradecemos su comprensión y colaboración en este asunto.
        
        Atentamente,
        
        Sistema de Parqueo FCYT';

        // Envía el correo electrónico y muestra un mensaje
        $mail->send();
        liberar_sitio_id($sitio);
        $mensaje = "La solicitud de desocupación del docente no fue aceptada debido a las deudas pendientes que tiene, y se le ha notificado al docente.";
        $titulo = "Error al aceptar la solicitud";
        $boton = "btn-danger";
        $link = "./visualizarSolicitudesLiberarSitio.php";
        include('../views/modalAceptacion.php');
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}
