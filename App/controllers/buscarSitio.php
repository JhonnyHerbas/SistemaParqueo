<?php

header('Location: /SistemaParqueo/App/views/visualizarSitio.php?' . (($_POST["nombre"]) ? 'nombre=' . $_POST["nombre"] : ''));
exit();

?>