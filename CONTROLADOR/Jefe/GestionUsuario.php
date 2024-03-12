
<?php
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';
?>
<?php
//CREAR---------------------------------------------------------------------------------------------
$rol = $_POST['rol'];
$departamento = $_POST['departamento'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['pass'];


$sql = "INSERT INTO usuario (id_rol, id_departamento, nombre, email, pass) VALUES ('$rol', '$departamento', '$nombre', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "<script> 
        swal({
            title: 'HECHO',
            text: 'Usuario ingresado correctamente',
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