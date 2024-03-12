<?php
include '../../MODELO/Conexion.php';

// Consulta SQL para obtener los auxiliares
$sql = "SELECT * FROM usuario WHERE id_rol = 2"; // El valor 2 representa el ID del rol "Auxiliar"
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Array para almacenar los auxiliares
    $auxiliares = array();

    // Iterar sobre los resultados y almacenarlos en el array $auxiliares
    while ($row = $resultado->fetch_assoc()) {
        $auxiliares[] = $row;
    }

    // Ahora $auxiliares contiene la información de todos los auxiliares
    // Puedes usar esta información según tus necesidades
    foreach ($auxiliares as $auxiliar) {
        echo "ID: " . $auxiliar['usuario_id'] . ", Nombre: " . $auxiliar['nombre'] . "<br>";
    }
} else {
    echo "No se encontraron auxiliares.";
}

// Cerrar la conexión

?>
