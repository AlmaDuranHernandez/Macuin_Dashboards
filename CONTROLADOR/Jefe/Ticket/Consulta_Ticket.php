<?php
    // Incluir la conexión a la base de datos
    include '../../../MODELO/Conexion.php';

    


    // Obtener los tickets de la base de datos
    $sql = "SELECT * FROM tickets";
    $resultado = $conn->query($sql);

    // Verificar si hay resultados
    if ($resultado && $resultado->num_rows > 0) {
        // Crear un array para almacenar los datos de los tickets
        $tickets = array();
        while ($row = $resultado->fetch_assoc()) {
            // Almacenar cada fila de la consulta en el array $tickets
            $tickets[] = $row;
        }
    } else {
        // Si no hay resultados, asignar un array vacío
        $tickets = array();
    }

    // Consulta adicional para obtener el nombre del auxiliar
    function obtenerNombreAuxiliar($idUsuario) {
        global $conn;

        // Preparar la consulta SQL con una declaración preparada
        $sql = "SELECT usuario.nombre
                FROM usuario
                INNER JOIN roles ON usuario.id_rol = roles.id
                WHERE usuario.usuario_id = ? AND roles.id = 2";

        // Preparar la declaración
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación fue exitosa
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("i", $idUsuario);

            // Ejecutar consulta
            $stmt->execute();

            // Obtener resultados
            $resultado = $stmt->get_result();

            // Verificar si se obtuvieron resultados
            if ($resultado && $resultado->num_rows > 0) {
                // Obtener el nombre del auxiliar
                $row = $resultado->fetch_assoc();
                $nombreAuxiliar = $row['nombre'];
                return $nombreAuxiliar;
            } else {
                // Si no se encontró el auxiliar, devolver un mensaje de error o un valor predeterminado
                return "Auxiliar no encontrado";
            }
        } else {
            // Si la preparación de la consulta falló, devolver un mensaje de error
            return "Error en la preparación de la consulta";
        }
    }

    // Función para buscar auxiliares
    function BuscarAuxiliares() {
        global $conn;
    
        $sql = "SELECT * FROM usuario WHERE id_rol = 2";
    
        // Ejecutar la consulta
        $resultado = $conn->query($sql);
    
        // Verificar si hay resultados
        if ($resultado && $resultado->num_rows > 0) {
            // Crear un array para almacenar los datos de los auxiliares
            $auxiliares = array();
            while ($row = $resultado->fetch_assoc()) {
                // Almacenar cada fila de la consulta en el array $auxiliares
                $auxiliares[] = $row;
            }
            return $auxiliares;
        } else {
            // Si no hay resultados, retornar un array vacío
            return array();
        }
    }
?>
