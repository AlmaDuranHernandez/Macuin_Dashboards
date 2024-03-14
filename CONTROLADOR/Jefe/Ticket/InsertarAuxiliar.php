<?php
    // Incluir la conexión a la base de datos
    include('C:\xampp\htdocs\Proyecto\Macuin_Dashboards\MODELO\Conexion.php');
    // Verificar si se ha enviado el formulario para añadir el auxiliar
    if(isset($_POST['guardar_cambios'])) {
        // Obtener los valores del formulario
        $id_auxiliar = htmlspecialchars($_POST['id_auxiliar']);
    

        // Actualizar el registro del ticket con el nuevo auxiliar
        $sql_actualizar_auxiliar = "UPDATE tickets SET id_auxiliar = '$id_auxiliar' WHERE ticket_id = '$id_auxiliar'";
        if ($conn->query($sql_actualizar_auxiliar) === TRUE) {
            echo "<script> 
                swal({
                    title: 'HECHO',
                    text: 'El auxiliar se añadió correctamente al ticket',
                    icon: 'success',
                    timer: 3000, 
                    button: false 
                }).then(function() {
                    window.location.href = ''; // Redirecciona a la página de gestión de tickets
                });
            </script>";
        } else {
            echo "Error al actualizar el auxiliar del ticket: " . $conn->error;
        }
    }
?>





