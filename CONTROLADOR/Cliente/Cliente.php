<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_ticket'])) {
    $delete_id = $_POST['eliminar_ticket'];

    $sql_select = "SELECT * FROM tickets WHERE ticket_id = '$delete_id'";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
        $descripcion = $ticket['descripcion'];
        $fecha = $ticket['fecha'];
        $estatus = $ticket['estatus'];

      
        $sql_delete = "DELETE FROM tickets WHERE ticket_id = '$delete_id'";
        if ($conn->query($sql_delete) === TRUE) {
            echo "<script> 
                swal({
                    title: 'HECHO',
                    text: 'El ticket se eliminó correctamente',
                    icon: 'success',
                    timer: 3000, 
                    button: false 
                }).then(function() {
                    window.location.href = ''; // Redirecciona a la página de inicio
                });
            </script>";  
        } else {
            // Si hay algún error durante la eliminación, puedes manejarlo aquí
            echo "Error al eliminar el ticket: " . $conn->error;
        }
    } else {
        echo "No se encontró el ticket a eliminar.";
    }
}
?>
