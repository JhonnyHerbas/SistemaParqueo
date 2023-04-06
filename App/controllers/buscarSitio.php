<?php

//header('Location: ./person_view.php?name=' . $_POST["name"] . '&apa=' . $_POST["last_name1"] . '&ama=' . $_POST["last_name2"]);
header('Location: /SistemaParqueo/App/views/visualizarSitio.php?' . (($_POST["nombre"]) ? 'nombre=' . $_POST["nombre"] : ''));
exit();

?>