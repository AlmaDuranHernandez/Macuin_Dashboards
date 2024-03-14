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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../GLOBAL/CSS/Generar_Reportes.css">
    
</head>
<body style="margin-top: 100px;">

<body>
    <p class="m-2">Seleccionar:</p>
    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filtrar por
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../../VISTAS/Jefe/Fechas.php">Fechas</a>
        <a class="dropdown-item" href="../../VISTAS/Jefe/Departamento.php">Departamentos</a>
        <a class="dropdown-item" href="../../VISTAS/Jefe/Auxiliar.php">Auxiliares</a>
      
    </div>
    
</body>
</html>
