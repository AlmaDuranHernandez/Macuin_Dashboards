<?php
session_start();
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_ticket'])) {
    // Obtiene el ID del ticket a eliminar
    $delete_id = $_POST['eliminar_ticket'];

    $sql_delete = "DELETE FROM tickets WHERE id = '$delete_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script> 
            swal({
                title: 'HECHO',
                text: 'El ticket se eliminó correctamente',
                icon: 'success',
                timer: 3000, 
                button: false 
            }).then(function() {
                window.location.href = '../VISTAS/generar_ticket.php'; // Redirecciona a la página de inicio
            });
        </script>";  
    } else {
        echo "Error al eliminar el ticket: " . $conn->error;
    }
}

?>