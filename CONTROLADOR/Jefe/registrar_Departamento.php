<?php
session_start();
include '../../MODELO/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_departamento"])) {
        $nombre_departamento = $_POST["nombre_departamento"];

        // Verificar si ya existe un departamento con el mismo nombre
        $sql_check = "SELECT COUNT(*) as count FROM departamentos WHERE departamento = '$nombre_departamento'";
        $result = $conn->query($sql_check);
        $row = $result->fetch_assoc();
        $count = $row['count'];

        if ($count > 0) {
            // Si ya existe un departamento con el mismo nombre, asignar mensaje de error
            $_SESSION['error_message'] = "Ya existe un departamento con el mismo nombre.";
        } else {
            // Insertar el departamento en la base de datos
            $sql_insert = "INSERT INTO departamentos (departamento) VALUES ('$nombre_departamento')";
            
            if ($conn->query($sql_insert) === TRUE) {
                // Redireccionar a la página de departamentos
                header("Location: ../../VISTAS/Jefe/Gestion_departamento.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error al insertar el departamento: " . $conn->error;
            }
        }
    } else {
        $_SESSION['error_message'] = "El nombre del departamento no está definido.";
    }
}

?>
