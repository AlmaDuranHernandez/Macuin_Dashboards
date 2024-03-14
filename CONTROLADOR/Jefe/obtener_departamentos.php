<?php
include '../../MODELO/Conexion.php';


// Realiza la consulta para obtener los departamentos desde la base de datos
$sql = "SELECT id, departamento FROM departamentos";
$resultado = $conn->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Crea un array para almacenar los datos de los departamentos
    $departamentos = array();
    while ($row = $resultado->fetch_assoc()) {
        // Almacena cada fila de la consulta en el array $departamentos
        $departamentos[] = $row;
    }
} else {
    // Si no hay resultados, puedes mostrar un mensaje o hacer lo que consideres apropiado
    $departamentos = array(); // En caso de que no haya resultados, asigna un array vacío
}
?>
