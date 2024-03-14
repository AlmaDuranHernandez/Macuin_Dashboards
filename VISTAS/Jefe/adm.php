<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<script>
    alert("Por favor inicia sesión");
    window.location = "";
    </script>';
    session_destroy();
    die();
}

include '../../VISTAS/General/CabeceraJefe.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="../../GLOBAL/CSS/index.css">
</head>
<body>
<div class="row row-gap-3 justify-content-center">
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Gestion Usuarios</h3>
                <img src="../../GLOBAL/PHOTO/3524752.png" alt="">
                <div class="button-container">
                    <a href="../Jefe/Gestion_usuarios.php" class="btn btn-primary" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Reportes</h3>
                <img src="../../GLOBAL/PHOTO/675523.png" alt="">
                <div class="button-container">
                    <a href="../../VISTAS/Jefe/Reportes.php" class="btn btn-primary" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Consulta de tickets</h3>
                <img src="../../GLOBAL/PHOTO/3524752.png" alt="">
                <div class="button-container">
                    <a href="../../VISTAS/Jefe/Consulta_ticket.php" class="btn btn-primary" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Administrar mi perfil </h3>
                <img src="../../GLOBAL/PHOTO/675523.png" alt="">
                <div class="button-container">
                    <a href="../../VISTAS/Cliente/AdmUser.php" class="btn btn-primary" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
