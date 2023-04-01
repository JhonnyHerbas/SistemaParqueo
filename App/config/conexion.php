<?php
    function get_connection(){
        
        // Leer el archivo config.ini y extrae las credenciales necesarias
        $config = parse_ini_file('config.ini', true);

        $host = $config['database']['host'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];
        $database = $config['database']['dbname'];
        
        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $conn;
        }
    }
    
?>