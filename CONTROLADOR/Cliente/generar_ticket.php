
<?php

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        $clasificacion = $_POST["eventLocation"];
        $descripcion = $_POST["eventDescription"];
    
    
        $sql = "INSERT INTO tickets (fecha, clasificacion, descripcion) VALUES (NOW(), '$clasificacion', '$descripcion')";
    
       
        if ($conn->query($sql) === TRUE) {
            echo "<script> 
            swal({
                title: 'HECHO',
                text: 'El tikcet se envio correctamente',
                icon: 'success',
                timer: 3000, 
                button: false 
            }).then(function() {
                window.location.href = '../VISTAS/generar_ticket.php'; // Redirecciona a la página de inicio
            });
        </script>";  
        } else {
            echo "Error al insertar el evento: " . $conn->error;
        }
    }
?>


