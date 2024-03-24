<?php
function conectar() {
    $host = '34.66.5.42';
    $port = '3306';
    $db   = 'macuindb';
    $user = 'root';
    $pass = 'pass';

    // Crear una conexión mysqli
    $conn = new mysqli($host, $user, $pass, $db, $port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}

function cerrarConexion($conn) {
    // Cerrar la conexión
    $conn->close();
}
?>
