<?php
// Incluir el archivo de conexión
include '../../MODELO/Conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha proporcionado un usuario_id y un ticket_id
    if (isset($_POST['id_auxiliar']) && isset($_POST['ticket_id_modal'])) {
        // Obtener los datos del formulario
        $idAuxiliar = $_POST['id_auxiliar'];
        $idTicket = $_POST['ticket_id_modal'];

        // Llamar a la función para insertar el auxiliar en la tabla Tickets
        insertarAuxiliar($idAuxiliar, $idTicket);
    } else {
        echo "Error: No se han proporcionado todos los datos necesarios.";
    }
} else {
    echo "Error: El formulario no se ha enviado correctamente.";
}

// Función para insertar el auxiliar en la tabla Tickets
function insertarAuxiliar($idAuxiliar, $idTicket) {
    // Obtener la conexión desde el archivo de conexión
    $conn = new mysqli($host, $user, $pass, $db, $port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar el id_auxiliar en la tabla Tickets
    $sql = "UPDATE tickets SET id_auxiliar = ? WHERE ticket_id = ?";
    $stmt = $conn->prepare($sql);

    // Verificar si la consulta preparada es válida
    if ($stmt === false) {
        echo "Error en la consulta: " . $conn->error;
    } else {
        // Vincular los parámetros y ejecutar la consulta
        $stmt->bind_param("ii", $idAuxiliar, $idTicket);
        $stmt->execute();

        // Verificar si la consulta se ejecutó correctamente
        if ($stmt->affected_rows > 0) {
            echo "Auxiliar añadido correctamente al ticket.";
        } else {
            echo "Error al añadir el auxiliar al ticket.";
        }

        // Cerrar la consulta y la conexión
        $stmt->close();
        $conn->close();
    }
}
?>
