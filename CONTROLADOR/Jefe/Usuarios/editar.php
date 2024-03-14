<?php
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';
?>


<?php

//editar usuario

$usuario_id = $_POST['usuario_id'];
$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$contrasena = $_POST['contrasena'];

$sql_editar = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$telefono', rol = '$rol', contrasena = '$contrasena' WHERE usuario_id = '$usuario_id'";
if ($conn->query($sql_editar) === TRUE) {
    echo "<script> 
        swal({
            title: 'HECHO',
            text: 'El usuario se editó correctamente',
            icon: 'success',
            timer: 3000, 
            button: false 
        }).then(function() {
            window.location.href = '../../VISTAS/Jefe/Gestion_usuarios.php'; // Redirecciona a la página de inicio
        });
    </script>";
} else {
    echo "Error al editar el usuario: " . $conn->error;
}


?>