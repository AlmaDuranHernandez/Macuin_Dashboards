<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recolección de Eventos</title>
  <link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/generar ticket.css">
</head>
<body>

<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';


?>

  <header>
    <h1>Generar Ticket</h1>
  </header>
 <div class="titulo"><h2>GENERAR TICKET</h2></div>
 
  <br><br><br><br><br>
  <main>
    <form id="eventForm" action="../CONTROLADOR/generar_ticket.php" method="POST">
      
      <label for="eventDate">Fecha:</label>
      <input type="date" id="eventDate" name="eventDate" required>

      <label for="eventLocation">Clasificacion:</label>
      <input type="text" id="eventLocation" name="eventLocation" required>

      <label for="eventDescription">Descripción:</label>
      <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>

      <button type="submit" >Enviar </button> 
    </form>
  </main>


  

</body>
</html>
