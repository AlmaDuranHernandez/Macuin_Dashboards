<?php

// Incluir el archivo de conexión
include '../MODELO/conexion.php';

class Modelo {

    private $mensaje = ""; // Propiedad para almacenar el mensaje

    public function obtenerInformacion() {
        global $conn; 

       
    
        $sql = "SELECT tickets.ticket_id, usuario.nombre, tickets.fecha, tickets.descripcion, tickets.estatus, usuario.departamento_id, departamentos.departamento
        FROM tickets
        INNER JOIN usuario ON tickets.usuario_id = usuario.usuario_id
        INNER JOIN departamentos ON usuario.departamento_id = departamentos.departamento_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
             $id = isset($row["ticket_id"]) ? $row["ticket_id"] : "N/A";
            $nombre = isset($row["nombre"]) ? $row["nombre"] : "N/A";
            $fecha = isset($row["fecha"]) ? $row["fecha"] : "N/A";
            $descripcion = isset($row["descripcion"]) ? $row["descripcion"] : "N/A";
            $estatus = isset($row["estatus"]) ? $row["estatus"] : "N/A";
            $departamento = isset($row["departamento"]) ? $row["departamento"] : "N/A";
        
            echo "Ticket ID: " . $id . " - Nombre: " . $nombre . " - Fecha: " . $fecha .  " - Descripción: " . $descripcion . " - Estatus: " . $estatus . " - Departamento: " . $departamento .  "<br>";
    }
} else {
    echo "0 Resultados";
}
    }

    
    public function insertarticket($ticket_id, $usuario_id, $fecha, $descripcion,$estatus,$clasificacion) {
        global $conn;
        $estatus = "Pendiente";
        
    
        $sql = "INSERT INTO tickets (ticket_id, usuario_id, fecha, descripcion,estatus,clasificacion)
                VALUES ('$ticket_id', '$usuario_id', '$fecha', '$descripcion','$estatus','$clasificacion')";
        if ($conn->query($sql) === TRUE) {
            $this->mensaje = "Nuevo registro creado";
        } else {
            $this->mensaje = "Error: " . $sql . "<br>" . $conn->error;
        }
    }}
    
    


