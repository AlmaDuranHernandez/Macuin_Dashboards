<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recolección de Eventos</title>
  <link rel="stylesheet" href="generar ticket.css">
</head>
<body>

  <header>
    <h1>Generar Ticket</h1>
  </header>

  <main>
    <form id="eventForm">
      

      <label for="eventDate">Fecha:</label>
      <input type="date" id="eventDate" name="eventDate" required>

      <label for="eventLocation">Clasificacion:</label>
      <input type="text" id="eventLocation" name="eventLocation" required>

      <label for="eventDescription">Descripción:</label>
      <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>

      <button type="button" onclick="submitForm()">Enviar Evento</button> <button type="button" >Cancelar</button>
    </form>
  </main>

  <footer>
    <p>&copy; Mascuin DASHBOARDS</p>
  </footer>

  <script>
    function submitForm() {
     
      alert('¡Evento enviado!');
    }
  </script>

</body>
</html>
