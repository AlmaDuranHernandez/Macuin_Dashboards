<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../Macuin_Dashboards/GLOBAL/CSS/Cabecera.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>
<body>


  <!-- NAV -->
  <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
    <a class="navbar-brand" hfre="inex.php"></a>
     <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
      <div class="logo"><img src="../../CC/Publico/Photo/Logo1.png"></div>
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
          <a class="nav-link active" href="../../CC/Vista/Login.php"><span class="sr-only ">CERRAR SESIÓN</span></a>
        </li>
      </ul>
    </div>
  </nav> 
