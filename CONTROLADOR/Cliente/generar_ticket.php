
<?php

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';

session_start();
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';
$email = $_SESSION['usuario'];

$sql = $conn->query("SELECT usuario_id FROM usuario WHERE email='$email'");
if ($sql->num_rows > 0) {
    $usuario = $sql->fetch_assoc();
    $ID = $usuario['usuario_id'];

   
} else {
    
    echo "Error al actualizar datos: " . $conn->error;
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        $clasificacion = $_POST["eventLocation"];
        $descripcion = $_POST["eventDescription"];
        $ID = $usuario['usuario_id'];
    
        $sql = "INSERT INTO tickets (usuario_id, fecha, clasificacion, descripcion) VALUES ('$ID', NOW(), '$clasificacion', '$descripcion')";
    
       
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


