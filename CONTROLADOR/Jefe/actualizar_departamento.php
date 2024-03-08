<?php
session_start();
include '../../MODELO/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_departamento"]) && isset($_POST["departamento_id"])) {
        $nombre_departamento = $_POST["nombre_departamento"];
        $departamento_id = $_POST["departamento_id"];

        // Actualizar el nombre del departamento en la base de datos
        $sql = "UPDATE departamentos SET departamento = '$nombre_departamento' WHERE id = $departamento_id";
        
        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página de departamentos después de la actualización
            header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
            exit();
        } else {
            echo "Error al actualizar el departamento: " . $conn->error;
        }
    } else {
        echo "Error: Datos incompletos para la actualización del departamento.";
    }
}
?>
