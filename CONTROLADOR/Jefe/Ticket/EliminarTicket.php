<?php
include('C:\xampp\htdocs\Proyecto\Macuin_Dashboards\MODELO\Conexion.php');
include '../../../VISTAS/General/CabeceraJefe.php';


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos necesarios
    if (isset($_POST['ticket_id_eliminar'])) {
        $eliminar = $_POST['ticket_id_eliminar'];

        // Preparar la consulta SQL usando una sentencia preparada
        $sql = "DELETE FROM tickets WHERE ticket_id = ?";
        
        // Preparar la sentencia
        $stmt = $conn->prepare($sql);
        
        // Vincular los parámetros
        $stmt->bind_param("i", $eliminar);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script> 
            swal({
                title: 'HECHO',
                text: 'El ticket fue eliminado correctamente',
                icon: 'success',
                timer: 3000, // El mensaje se mostrará durante 3 segundos
                button: false // No mostrará ningún botón para cerrar el mensaje
            }).then(function() {
                window.location.href = '../../../VISTAS/Jefe/Consulta_ticket.php'; // Redirecciona a la página de inicio
            });
        </script>";  
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        } 
    } else {
        echo "Error: No se recibieron todos los datos necesarios.";
    }
}

// Cerrar la conexión
$conn->close();
?>
