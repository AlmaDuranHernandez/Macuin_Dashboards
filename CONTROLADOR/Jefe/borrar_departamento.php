<?php
// Incluir el archivo de conexión a la base de datos y otras inclusiones
include '../../MODELO/Conexion.php';

session_start();

// Inicializar los mensajes por defecto
$success_message = "";
$error_message = "";
$warning_message = "";

// Verificar si se ha enviado un ID de departamento para borrar
if(isset($_GET['borrar_departamento'])) {
    $id_departamento = $_GET['borrar_departamento'];

    try {
        // Intentar ejecutar la consulta de borrado
        $stmt = $conn->prepare("DELETE FROM departamentos WHERE id = ?");
        $stmt->bind_param("i", $id_departamento);
        $stmt->execute();

        // Verificar si se ha eliminado alguna fila
        if ($stmt->affected_rows > 0) {
            $success_message = "Departamento eliminado correctamente.";
        } else {
            $error_message = "No se ha podido borrar el departamento.";
        }

        // Cerrar la declaración
        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        // Capturar la excepción de la base de datos
        if ($e->getCode() == 1451) {
            // Si la excepción es debido a la restricción de clave externa (1451), mostrar un mensaje de error
            $error_message = "No se puede borrar el departamento porque tiene tickets asociados.";
        } else {
            // Si hay otro tipo de error, mostrar un mensaje genérico
            $error_message = "Error al intentar borrar el departamento.";
        }
    }

    // Almacenar los mensajes en la sesión
    $_SESSION['success_message'] = $success_message;
    $_SESSION['error_message'] = $error_message;
    $_SESSION['warning_message'] = $warning_message;

} else {
    // Si no se ha especificado un departamento para borrar, establecer un mensaje de advertencia
    $warning_message = "No se ha especificado un departamento para borrar.";
    $_SESSION['warning_message'] = $warning_message;
}

// Redirigir a la página Gestion_departamento.php
header("Location: ../../VISTAS/Jefe/Gestion_departamento.php");
exit();
?>
