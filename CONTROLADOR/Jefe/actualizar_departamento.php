<?php

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/CabeceraJefe.php';
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
                echo "<script>
                swal('Error','El departamento ya existe en el sistema','error').then(function() {
                    window.location =  '../../VISTAS/Jefe/Gestion_departamento.php';
                });
            </script>"; 
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
            echo "<script> 
                    swal({
                        title: 'HECHO',
                        text: 'El departamneto fue actualizado correctamente',
                        icon: 'success',
                        timer: 2000, // El mensaje se mostrará durante 3 segundos
                        button: false // No mostrará ningún botón para cerrar el mensaje
                    }).then(function() {
                        window.location.href = '../../VISTAS/Jefe/Gestion_departamento.php'; // Redirecciona a la página de inicio
                    });
                </script>";  
        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: ../../VISTAS/Jefe/Gestion_Departamento.php");
            exit();
        }
    } else {
        echo "<script>
        swal('Error','Los datso estan incompletas, revisa porfavor','error').then(function() {
            window.location =  '../../VISTAS/Jefe/Gestion_departamento.php';
        });
    </script>"; 
        exit();
    }
}
?>
