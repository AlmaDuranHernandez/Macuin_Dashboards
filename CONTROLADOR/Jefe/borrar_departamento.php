<?php
include '../../MODELO/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["borrar_departamento"])) {
    // Obtener el ID del departamento a borrar desde la URL
    $id_departamento = $_GET["borrar_departamento"];

    // Realizar la consulta para borrar el departamento
    $sql_borrar = "DELETE FROM departamentos WHERE id = $id_departamento";

    if ($conn->query($sql_borrar) === TRUE) {
        // Redireccionar a la página actual después de borrar el departamento
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Si hay un error en la consulta, puedes manejarlo aquí
        echo "Error al borrar el departamento: " . $conn->error;
    }
}
?>
