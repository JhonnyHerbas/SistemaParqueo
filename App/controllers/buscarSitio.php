<?php

header('Location: ../views/visualizarSitio.php?' . (($_POST["nombre"]) ? 'nombre=' . $_POST["nombre"] : ''));
exit();

?>