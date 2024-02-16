<?php

include '../MODELO/Conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $fecha = $_POST["eventDate"];
        $clasificacion = $_POST["eventLocation"];
        $descripcion = $_POST["eventDescription"];
    
    
        $sql = "INSERT INTO tickets (fecha, clasificacion, descripcion) VALUES ('$fecha', '$clasificacion', '$descripcion')";
    
       
        if ($conn->query($sql) === TRUE) {
            echo "Evento insertado correctamente.";
        } else {
            echo "Error al insertar el evento: " . $conn->error;
        }
    }
?>


