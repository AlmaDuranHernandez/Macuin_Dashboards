<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/cabecera.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>


  <!-- NAV -->
  <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
    <a class="navbar-brand" hfre="inex.php"></a>
     <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
      <div class="logo"><img src="../../../Proyecto/Macuin_Dashboards/GLOBAL/PHOTO/Captura de pantalla 2024-02-13 075550.png"></div>
       <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php"><span class="sr-only "><i class="bi bi-house-door"></i>  HOME</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../CC/Vista/mostrarcarrito.php"><span class="sr-only "><i class="bi bi-cart"></i>    (<?php
           echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
           ?>)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../CC/Vista/miscompras.php"><span class="sr-only ">MIS COMPRAS</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="../../CC/Vista/contactanos.php"><span class="sr-only ">CONTÁCTANOS</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../../Proyecto/Macuin_Dashboards/VISTAS/Login.php"><span class="sr-only ">CERRAR SESIÓN</span></a>
        </li>
      </ul>
    </div>
  </nav> 
