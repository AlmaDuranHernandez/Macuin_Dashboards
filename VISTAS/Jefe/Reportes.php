<?php
include '../../CONTROLADOR/Jefe/Reportes/ContrRep.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["departamento"])) {
    // Obtener el valor del departamento seleccionado
    $departamento_seleccionado = $_POST["departamento"];
    
    // Imprimir el valor del departamento seleccionado
    echo "Departamento seleccionado: " . $departamento_seleccionado;

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])) {
    // Obtener las fechas de inicio y fin del formulario
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];

    // Imprimir las fechas seleccionadas
    echo "Fecha de inicio: " . $fecha_inicio . "<br>";
    echo "Fecha de fin: " . $fecha_fin;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["auxiliar"])) {
    // Obtener el ID del auxiliar seleccionado
    $auxiliar_seleccionado = $_POST["auxiliar"];

    // Imprimir el ID del auxiliar seleccionado
    echo "Auxiliar seleccionado: " . $auxiliar_seleccionado;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reportes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    
    <!-- Cabecera -->
    <div class="container mt-5">
        <h1 class="mb-4">Generar Reportes</h1>
        <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reporte de Auxiliares</h5>
                <p class="card-text">Genera un reporte de los auxiliares.</p>
                <form action="../../CONTROLADOR/Jefe/Reportes/generarpdfusuario.php" method="post">
                    <div class="form-group">
                        <label for="auxiliar">Selecciona un auxiliar:</label>
                        <select class="form-control" id="auxiliar" name="auxiliar">
                        <?php foreach ($auxiliares as $auxiliar): ?>
                            <option value="<?php echo $auxiliar['usuario_id']; ?>"><?php echo $auxiliar['nombre']; ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>
            </div>
        </div>
    </div>
     <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reporte de Tickets</h5>
                        <p class="card-text">Genera un reporte de todos los Tickets.</p>
                        <a href="../../CONTROLADOR/Jefe/Reportes/generarpdftodo.php" class="btn btn-primary">Generar</a>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container mt-5">
            <div class="border p-3">
                <h2 class="mt-4">Reporte por fechas</h2>
                <form action="../../CONTROLADOR/Jefe/Reportes/generarpdffecha.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fecha_inicio">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_fin">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Generar Reporte</button>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <div class="border p-3">
                <h2 class="mt-4">Reporte por departamento</h2>
                <form action="../../CONTROLADOR/Jefe/Reportes/generarpdfdepa.php" method="POST">
                    <div class="form-group">
                        <label for="departamento">Selecciona un departamento:</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <?php foreach ($departamentos as $departamento): ?>
                                <option value="<?php echo $departamento['id']; ?>"><?php echo $departamento['departamento']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Generar Reporte</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
