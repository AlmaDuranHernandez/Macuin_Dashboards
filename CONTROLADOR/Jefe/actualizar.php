<?php
include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';

// Verificar si se recibieron los datos necesarios
if(isset($_POST['roles'], $_POST['departamentos'], $_POST['nombres'], $_POST['emails'], $_POST['passs'], $_POST['user_id'])) {
    // Obtener los valores de los campos del formulario
    $rol = $_POST['roles'];
    $departamento = $_POST['departamentos'];
    $nombre = $_POST['nombres'];
    $email = $_POST['emails'];
    $password = $_POST['passs'];
    $user_id = $_POST['user_id']; // Cambiar el nombre de la variable para reflejar su uso

    // Preparar la consulta SQL para actualizar el usuario
    $sql = "UPDATE usuario SET id_rol = ?, id_departamento = ?, nombre = ?, email = ?, pass = ? WHERE usuario_id = ?";

    // Preparar la declaración SQL
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("iisssi", $rol, $departamento, $nombre, $email, $password, $user_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir con un mensaje de éxito
        header("Location: ../../VISTAS/Jefe/Gestion_usuarios.php?success=1");
        exit();
    } else {
        // Redirigir con un mensaje de error si la consulta falla
        header("Location: ../../VISTAS/Jefe/Gestion_usuarios.php?error=1");
        exit();
    }
} else {
    // Redirigir si no se recibieron todos los datos necesarios
    header("Location: ../../VISTAS/Jefe/Gestion_usuarios.php?error=2");
    exit();
}
?>
