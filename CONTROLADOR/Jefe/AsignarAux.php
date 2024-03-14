<?php
include('C:\xampp\htdocs\Proyecto\Macuin_Dashboards\MODELO\Conexion.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos necesarios
    if (isset($_POST['id_auxiliar']) && isset($_POST['ticket_id'])) {
        // Obtener y sanitizar los datos recibidos
        $id_auxiliar = $_POST['id_auxiliar'];
        $ticket_id = $_POST['ticket_id'];

        // Preparar la consulta SQL para actualizar el ID del auxiliar en la tabla de tickets
        $sql = "UPDATE tickets SET id_auxiliar = '$id_auxiliar' WHERE ticket_id = '$ticket_id'";
        
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "El ID del auxiliar se ha insertado correctamente en la tabla de tickets.";
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
