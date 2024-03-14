<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recolección de Eventos</title>
  <link rel="stylesheet" href="../../GLOBAL/CSS/generar ticket.css">
</head>
<body>

<?php
include '../../VISTAS/General/Cabecera.php';


?>

  <header>
    <h1>Generar Ticket</h1>
  </header>
 <div class="titulo"><h2>GENERAR TICKET</h2></div>
 
  
  <main>
    
    <form id="eventForm" action="../../CONTROLADOR/Cliente/generar_ticket.php" method="POST">
      
    

      <label for="eventLocation">Clasificacion:</label>
  <input type="text" id="eventLocation" name="eventLocation" list="opciones" require>

  <datalist id="opciones">
    <option value="Falla de Office ">
    <option value="Fallas en la red">
    <option value="Errores de software">
    <option value="Errores de Hardware">
    <option value="Mantenientos Preventivos">
  </datalist>

      <label for="eventDescription">Descripción:</label>
      <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>

      <button type="submit" >Enviar </button> 
    </form>
  </main>


  

</body>
</html>