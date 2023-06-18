<?php

header('Location: ../views/registroIngreso.php?' . (($_POST["nombre"]) ? 'nombre=' . $_POST["nombre"] : ''));
exit();

?>