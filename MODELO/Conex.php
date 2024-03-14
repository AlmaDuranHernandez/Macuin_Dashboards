<?php
function conectar() {
    $host = 'roundhouse.proxy.rlwy.net';
    $port = '24462';
    $db   = 'macuindb';
    $user = 'root';
    $pass = '34-5GfBbab1BDAcB6bHbA3d2aHCd6hd6';

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
