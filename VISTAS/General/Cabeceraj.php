<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href= "../../GLOBAL/CSS/cabecera.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>


  <!-- NAV -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="inex.php"></a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div id="my-nav" class="collapse navbar-collapse">
        <div class="logo">
            <img src="../../GLOBAL/PHOTO/logo.png">
        </div>
        <ul class="navbar-nav ms-auto">
          
            <li class="nav-item">
                <a class="nav-link active" href="../../VISTAS/Cliente/IndeAdm.php"><span class="sr-only "><i class="bi bi-house-door"></i>  Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../../CC/Vista/mostrarcarrito.php"><span class="sr-only ">Notificaciones  (<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../../VISTAS/General/Login.php"><span class="sr-only ">Cerrar sesion </a>
            </li>
        </ul>
    </div>
</nav>

