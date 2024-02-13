<?php
// Incluir el archivo de conexión
include '../MODELO/conexion.php';
// Incluir el archivo del modelo
include '../MODELO/modelo.php';

// Instanciar el objeto del modelo
$modelo = new Modelo();
$modelo->obtenerInformacion();

//$modelo->insertarticket('11', '1', '2024-02-29,','Error en windows','','Error en sistema');


