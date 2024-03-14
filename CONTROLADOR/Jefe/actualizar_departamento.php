<?php
session_start();
include '../../MODELO/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nuevo_nombre"]) && isset($_POST["departamento_id"])) {
        try {
            // Obtener y limpiar los datos del formulario
            $nuevo_nombre = htmlspecialchars($_POST["nuevo_nombre"]);
            $departamento_id = intval($_POST["departamento_id"]);

            // Verificar si el nuevo nombre ya existe
            $sql_check = "SELECT COUNT(*) as count FROM departamentos WHERE departamento = ? AND id != ?";
            $stmt_check = $conn->prepare($sql_check);
            if (!$stmt_check) {
                throw new Exception("Error al preparar la consulta: " . $conn->error);
            }
            $stmt_check->bind_param("si", $nuevo_nombre, $departamento_id);
            if (!$stmt_check->execute()) {
                throw new Exception("Error al ejecutar la consulta: " . $stmt_check->error);
            }
            $result_check = $stmt_check->get_result();
            $row_check = $result_check->fetch_assoc();
            $count = $row_check['count'];
            $stmt_check->close();

            if ($count > 0) {
                $_SESSION['error_message'] = "Ya existe un departamento con el mismo nombre.";
                header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
                exit();
            }

            // Preparar y ejecutar la consulta para actualizar el nombre del departamento
            $sql_update = "UPDATE departamentos SET departamento = ? WHERE id = ?";
            $stmt_update = $conn->prepare($sql_update);
            if (!$stmt_update) {
                throw new Exception("Error al preparar la consulta: " . $conn->error);
            }
            $stmt_update->bind_param("si", $nuevo_nombre, $departamento_id);
            if (!$stmt_update->execute()) {
                throw new Exception("Error al ejecutar la consulta: " . $stmt_update->error);
            }
            $stmt_update->close();

            // Redireccionar a la página de departamentos después de la actualización
            $_SESSION['success_message'] = "Departamento actualizado correctamente.";
            header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Datos incompletos para la actualización del departamento.";
        header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
        exit();
    }
}
?>
