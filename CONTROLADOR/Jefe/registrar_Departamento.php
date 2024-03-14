<?php
session_start();
include '../../MODELO/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_departamento"])) {
        $nombre_departamento = $_POST["nombre_departamento"];

        try {
            // Verificar si ya existe un departamento con el mismo nombre
            $stmt_check = $conn->prepare("SELECT COUNT(*) as count FROM departamentos WHERE departamento = ?");
            $stmt_check->bind_param("s", $nombre_departamento);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $row_check = $result_check->fetch_assoc();
            $count = $row_check['count'];
            $stmt_check->close();

            if ($count > 0) {
                // Si ya existe un departamento con el mismo nombre, asignar mensaje de error
                $_SESSION['error_message'] = "Ya existe un departamento con el mismo nombre.";
                header("Location: ../../VISTAS/Jefe/Gestion_departamento.php");
                exit();
            } else {
                // Insertar el departamento en la base de datos
                $stmt_insert = $conn->prepare("INSERT INTO departamentos (departamento) VALUES (?)");
                $stmt_insert->bind_param("s", $nombre_departamento);
                $stmt_insert->execute();

                // Verificar si se insertó correctamente
                if ($stmt_insert->affected_rows > 0) {
                    // Redireccionar a la página de departamentos
                    $_SESSION['success_message'] = "Departamento insertado correctamente.";
                    header("Location: ../../VISTAS/Jefe/Gestion_departamento.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Error al insertar el departamento.";
                }

                $stmt_insert->close();
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al ejecutar la consulta: " . $e->getMessage();
        }
    } else {
        $_SESSION['error_message'] = "El nombre del departamento no está definido.";
    }
}

// Si no se realizó ninguna acción, redirigir a la página de departamentos
header("Location: ../../VISTAS/Jefe/Gestion_departamento.php");
exit();
?>
