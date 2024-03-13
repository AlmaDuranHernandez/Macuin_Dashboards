<?php
include '../../VISTAS/General/Cabecera copy.php';
include '../../MODELO/Conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar reportes</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../GLOBAL/CSS/Fechas.css">
</head>
<body style="margin-top: 100px;">

<body>

    <div class="fecha-container">
        <div class="fecha-item">
            <p class="m-2">Seleccionar fecha de inicio:</p>
            <button id="fechaInicioBtn">Inicio</button>
            <input type="text" id="fechaInicio">
        </div>
        <div class="fecha-item">
            <p class="m-2">Seleccionar fecha de fin:</p>
            <button id="fechaFinBtn">Final</button>
            <input type="text" id="fechaFin">
        </div>
    </div>

    <div class="search-container">
        <input type="text" class="search-input" placeholder="Buscar...">
        <button class="search-button">Buscar</button>
    </div>
    <a href="../../VISTAS/Jefe/Fechas.php" class="btn">Regresar</a>

    <script>
        $(document).ready(function () {
            // Inicializar los datepickers
            $("#fechaInicio").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function(selectedDate) {
                    $("#fechaFin").datepicker("option", "minDate", selectedDate);
                }
            });

            $("#fechaFin").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function(selectedDate) {
                    $("#fechaInicio").datepicker("option", "maxDate", selectedDate);
                }
            });

            // Asignar eventos de clic a los botones
            $("#fechaInicioBtn").click(function () {
                $("#fechaInicio").datepicker("show");
            });

            $("#fechaFinBtn").click(function () {
                $("#fechaFin").datepicker("show");
            });
        });
    </script>

</body>
</html>
