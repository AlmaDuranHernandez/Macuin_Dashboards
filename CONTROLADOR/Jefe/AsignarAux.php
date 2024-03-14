<?php
include('C:\xampp\htdocs\Proyecto\Macuin_Dashboards\MODELO\Conexion.php');
include '../../VISTAS/General/CabeceraJefe.php';


  
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos necesarios
    if (isset($_POST['id_auxiliar']) && isset($_POST['ticket_id_modal'])) {
        // Obtener y sanitizar los datos recibidos
        $id_auxiliar = $_POST['id_auxiliar'];
        $ticket_id = $_POST['ticket_id_modal'];

        // Preparar la consulta SQL para actualizar el ID del auxiliar en la tabla de tickets
        $sql = "UPDATE tickets SET id_auxiliar = '$id_auxiliar' WHERE ticket_id = '$ticket_id'";
        
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "<script> 
            swal({
                title: 'HECHO',
                text: 'El auxiliar se asigno correctamente',
                icon: 'success',
                timer: 3000, // El mensaje se mostrará durante 3 segundos
                button: false // No mostrará ningún botón para cerrar el mensaje
            }).then(function() {
                window.location.href = '../../VISTAS/Jefe/Consulta_ticket.php'; // Redirecciona a la página de inicio
            });
        </script>";  
        } else {
            echo "Error al ejecutar la consulta: " . $conn->error;
        } 
    } else {
        echo "Error: No se recibieron todos los datos necesarios.";
    }
}

// Cerrar la conexión
$conn->close();
?>