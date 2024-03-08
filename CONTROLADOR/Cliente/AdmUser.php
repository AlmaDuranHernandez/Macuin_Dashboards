<?php


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
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE usuario SET nombre='$nombre', email='$email', pass='$password' WHERE usuario_id ='$ID'"; 

    // Ejecutar la consulta

    // Tu código para ejecutar la consulta SQL y verificar si se actualizó correctamente
    
    if ($conn->query($sql) === TRUE) {
      echo "<script> 
        swal({
            title: 'HECHO',
            text: 'Los datos ingresados se cambiaron correctamente',
            icon: 'success',
            timer: 3000, // El mensaje se mostrará durante 3 segundos
            button: false // No mostrará ningún botón para cerrar el mensaje
        }).then(function() {
            window.location.href = '../../VISTAS/Cliente/AdmUser.php'; // Redirecciona a la página de inicio
        });
    </script>";  
    } else {
        // Si hubo un error en la consulta, imprimir el mensaje de error
        echo "Error al actualizar datos: " . $conn->error;
    }
}
    // Cerrar la conexión
  
    ?>
    