<?php

session_start();
 if (!isset($_SESSION['usuario'])) {
   echo '<script>
   alert("Por favor inicia sesión");
   window.location = "../CC/Vista/Login.php";
   </script>';
   session_destroy();
   die();
 } 

  
  include '../../VISTAS/General/Cabecera.php';
  
  
 
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
 

   
            
 
    <div class="row  row-gap-3">
    <div class="row justify-content-center row-gap-3">
    
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Gestion Usuarios</h3>
                <img src="../../GLOBAL/PHOTO/3524752.png" alt="">
                <div class="button-container">
                <button type="button" class="btn btn-primary">
                 <a href="../Jefe/Gestion_usuarios.php" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card"> 
            <div class="card-body">
                <h3>Jefe de soporte</h3>
                <img src="../../GLOBAL/PHOTO/675523.png" alt="">
                <div class="button-container">
                <button type="button" class="btn btn-primary">
                 <a href="../Macuin_Dashboards/VISTAS/Jefe/Jefe_Soporte.php" style="color: inherit; text-decoration: none;"> Acceder <i class="bi bi-hand-index"></i></a>
                </button>
                </div>
            </div>
        </div>
    </div>

    </div>
            
  
   
</body>
</html>