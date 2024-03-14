<?php
// Incluir el archivo de conexión a la base de datos y otras inclusiones
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';

session_start();


if(isset($_GET['borrar_departamento'])) {
    $id_departamento = $_GET['borrar_departamento'];

    try {
        $stmt = $conn->prepare("DELETE FROM departamentos WHERE id = ?");
        $stmt->bind_param("i", $id_departamento);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script> 
                    swal({
                        title: 'HECHO',
                        text: 'El departamneto fue eliminado correctamente',
                        icon: 'success',
                        timer: 2000, // El mensaje se mostrará durante 3 segundos
                        button: false // No mostrará ningún botón para cerrar el mensaje
                    }).then(function() {
                        window.location.href = '../../VISTAS/Jefe/Gestion_departamento.php'; // Redirecciona a la página de inicio
                    });
                </script>";
        } else {
            echo "<script>
            swal('Error','No fue posible eliminar el departamento, intentelo nuevamente','error').then(function() {
                window.location =  '../../VISTAS/Jefe/Gestion_departamento.php';
            });
        </script>"; 
        }

        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            echo "<script>
            swal('Error','El departamento no se puede eliminar porque cuenta con usuarios registrados','error').then(function() {
                window.location =  '../../VISTAS/Jefe/Gestion_departamento.php';
            });
        </script>"; 
        } else {
            // Si hay otro tipo de error, mostrar un mensaje genérico
            $error_message = "Error al intentar borrar el departamento.";
        }
    }

    // Almacenar los mensajes en la sesión
 

} else {
    // Si no se ha especificado un departamento para borrar, establecer un mensaje de advertencia
    $warning_message = "No se ha especificado un departamento para borrar.";
    $_SESSION['warning_message'] = $warning_message;
}


?>
