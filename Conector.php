<?php
$servername = "127.0.0.1";
$username = "root"; //<------ Pongan su Usuario de su MYSQL
$password = ""; // <----- Pongan su contraseña de su MYSQL
$database = "macuindb";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los departamentos
//$sql = "SELECT * FROM departamentos";
//$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los departamentos
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["departamento_id"] . " - Departamento: " . $row["departamento"] . "<br>";
    }
} else {
    echo "No se encontraron departamentos";
}

// Cerrar la conexión

?>
