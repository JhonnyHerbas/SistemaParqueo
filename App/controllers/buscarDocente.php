<?php

header('Location: ../views/vistaGuardia.php?' . (($_POST["nombre"]) ? 'nombre=' . $_POST["nombre"] : ''));
exit();

?>