<?php

    // Leer el archivo config.ini y extrae las credenciales necesarias
    $config = parse_ini_file('config.ini', true);
    
    $host = $config['database']['host'];
    $username = $config['database']['username'];
    $password = $config['database']['password'];
    $dbname = $config['database']['dbname'];
    
    // Crear una conexion a la base de datos utilizando credenciales
    $conn = new mysqli($host, $username, $password, $dbname);

    // Verificar si la conexion falla
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }else{
        echo "Conexion establecida";
    }

?>