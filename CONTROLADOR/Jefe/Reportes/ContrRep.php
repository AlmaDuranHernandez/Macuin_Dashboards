<?php
// Incluir el archivo de conexión a la base de datos
include 'Conex.php';


// Función para obtener los departamentos desde la base de datos
function obtenerDepartamentos() {
    // Conectar a la base de datos usando la función definida en conex.php
    $conn = conectar();

    // Consulta SQL para obtener los departamentos
    $sql = "SELECT id, departamento FROM departamentos";
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al obtener los departamentos: " . $conn->error);
    }

    // Crear un array para almacenar los departamentos
    $departamentos = [];

    // Verificar si se encontraron departamentos
    if ($result->num_rows > 0) {
        // Iterar sobre cada fila de resultado y agregar los departamentos al array
        while($row = $result->fetch_assoc()) {
            $departamentos[] = $row;
        }
    }

    // Cerrar la conexión a la base de datos
    cerrarConexion($conn);

    // Retornar el array de departamentos
    return $departamentos;
}

// Llamar a la función para obtener los departamentos
$departamentos = obtenerDepartamentos();

// Función para obtener los auxiliares desde la base de datos
function obtenerauxiliares() {
    // Conectar a la base de datos usando la función definida en conex.php
    $conn = conectar();

    // Consulta SQL para obtener los auxiliares
    $sql = "SELECT usuario_id, nombre FROM usuario WHERE id_rol = '2'";
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al obtener los auxiliares: " . $conn->error);
    }

    // Crear un array para almacenar los auxiliares
    $auxiliares = [];

    // Verificar si se encontraron auxiliares
    if ($result->num_rows > 0) {
        // Iterar sobre cada fila de resultado y agregar los auxiliares al array
        while($row = $result->fetch_assoc()) {
            $auxiliares[] = $row;
        }
    }

    // Cerrar la conexión a la base de datos
    cerrarConexion($conn);

    // Retornar el array de auxiliares
    return $auxiliares;
}

// Llamar a la función para obtener los auxiliares
$auxiliares = obtenerauxiliares();

// Verificar si se obtuvieron los auxiliares
if (!empty($auxiliares)) {
    // Iterar sobre los auxiliares y mostrar los resultados
    foreach ($auxiliares as $auxiliar) {
        echo "ID: " . $auxiliar['usuario_id'] . ", Nombre: " . $auxiliar['nombre'] . "<br>";
    }
} else {
    echo "No se encontraron auxiliares.";
}
?>
