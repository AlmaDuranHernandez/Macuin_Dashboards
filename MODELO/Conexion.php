<?php
$servername = "34.66.5.42";    //<---- Si están en la misma máquina que el servidor de MYSQL pongan localhost
$username = "root"; //<------ Pongan su Usuario de su MYSQL
$password = "pass"; // <----- Pongan su contraseña de su MYSQL
$database = "macuindb";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Cerrar la conexión
$conn->close();
?>
