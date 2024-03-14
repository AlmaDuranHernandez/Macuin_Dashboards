<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador Freelance</title>
</head>
<body>
    <h1>Cotizador Freelance</h1>
    <?php
    // Verificar si se han enviado datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $sueldo = $_POST['sueldo'];
        $horas = $_POST['horas'];
        
        // Calcular costos
        $sueldo_total = $sueldo * $horas;
        $depreciacion_equipo = 2.60 * $horas;
        $costo_internet = 2.5 * $horas;
        $costo_software = 5.42 * $horas;
        $costo_transporte = 143.75;
        $costo_imagenes = 50;
        $horas_cambios = 2;
        $ganancia = 265.5;
        $costos_fijos = $depreciacion_equipo + $costo_internet + $costo_software + $costo_transporte + $costo_imagenes + ($horas_cambios * $sueldo);
        $total_costos_variables = $sueldo_total + $costos_fijos;
        $total = $total_costos_variables + $ganancia;
        
        // Mostrar resultados
        echo "<h2>Resultado del cálculo</h2>";
        echo "<p>Sueldo total: $sueldo_total</p>";
        echo "<p>Costos fijos: $costos_fijos</p>";
        echo "<p>Total de costos variables: $total_costos_variables</p>";
        echo "<p>Total: $total</p>";
    } else {
    ?>
    <form method="post">
        <label for="sueldo">Selecciona el nivel de experiencia:</label>
        <select name="sueldo" id="sueldo">
            <option value="3500">Trainee</option>
            <option value="7000">Junior</option>
            <option value="15000">Senior</option>
        </select><br><br>
        <label for="horas">Horas estimadas para el proyecto:</label>
        <input type="number" name="horas" id="horas" required><br><br>
        <button type="submit">Calcular</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
