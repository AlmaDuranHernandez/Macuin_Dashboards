<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Variable de Sesión</title>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        // Verificar si la variable de sesión está definida y no es nula
        if (isset($_SESSION['usuario'])) {
            // La variable de sesión tiene un valor, puedes usarla aquí
            $email = $_SESSION['usuario'];
            echo "<p>La variable de sesión 'usuario' tiene el valor: $email</p>";
        } else {
            // La variable de sesión no tiene ningún valor
            echo "<p>La variable de sesión 'usuario' no está definida o es nula</p>";
        }
          // Verificar si la variable de sesión está definida y no es nula
          if (isset($_SESSION['nombre'])) {
            // La variable de sesión tiene un valor, puedes usarla aquí
            $email = $_SESSION['nombre'];
            echo "<p>La variable de sesión 'usuario' tiene el valor: $nombre</p>";
        } else {
            // La variable de sesión no tiene ningún valor
            echo "<p>La variable de sesión 'usuario' no está definida o es nula</p>";
        }
        ?>
    </div>
</body>
</html>
