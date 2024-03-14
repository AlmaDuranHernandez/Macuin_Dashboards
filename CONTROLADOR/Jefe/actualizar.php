<?php
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';




$eliminar_id = $_POST['user_id'];
echo $eliminar_id;
      

// Verificar si se recibieron los datos necesarios
if(isset($_POST['roles'], $_POST['departamentos'], $_POST['nombres'], $_POST['emails'], $_POST['passs'])) {
    // Obtener los valores de los campos del formulario
    $rol = $_POST['roles'];
    $departamento = $_POST['departamentos'];
    $nombre = $_POST['nombres'];
    $email = $_POST['emails'];
    $password = $_POST['passs'];

    // Preparar la consulta SQL para actualizar el usuario
    $sql = "UPDATE usuario SET id_rol = '$rol', id_departamento = '$departamento', nombre = '$nombre', email = '$email', pass = '$password' 
    WHERE usuario_id = '$eliminar_id'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<script> 
            swal({
                title: 'HECHO',
                text: 'Usuario actualizado correctamente',
                icon: 'success',
                timer: 3000, // El mensaje se mostrará durante 3 segundos
                button: false // No mostrará ningún botón para cerrar el mensaje
            }).then(function() {
                window.location.href = '../../VISTAS/Jefe/Gestion_usuarios.php'; // Redirecciona a la página de inicio
            });
        </script>"; 
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Por favor, asegúrate de enviar todos los datos necesarios.";
}
?>
