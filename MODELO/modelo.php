<?php


// Incluir el archivo de conexión
include('conexion.php');

class Modelo {

    public function obtenerInformacion() {
        global $conn; 


        $sql = "SELECT * FROM departamento";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["fecha"]. "<br>";
            }
        } else {
            echo "0 Resultados";
        }


        $conn->close();            

        
    }
}
?>
