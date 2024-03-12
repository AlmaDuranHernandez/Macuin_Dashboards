<?php
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';
?>


<?php

$delete_id = $_POST['usuario_id'];
      
        $sql_eliminar = "DELETE FROM usuario WHERE usuario_id = '$delete_id'";
        if ($conn->query($sql_eliminar) === TRUE) {
            echo "<script> 
                swal({
                    title: 'HECHO',
                    text: 'El usuario se eliminó correctamente',
                    icon: 'success',
                    timer: 3000, 
                    button: false 
                }).then(function() {
                    window.location.href = '../../VISTAS/Jefe/Gestion_usuarios.php'; // Redirecciona a la página de inicio
                });
            </script>";  
        } else {
           
            echo "Error al eliminar el ticket: " . $conn->error;
        }
    

?>

