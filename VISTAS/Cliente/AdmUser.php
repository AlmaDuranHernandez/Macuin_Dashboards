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

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/';
$email = $_SESSION['usuario'];

$sql = $conn->query("SELECT usuario_id, nombre, email, pass FROM usuario WHERE email='$email'");
if ($sql->num_rows > 0) {
    // Obtener los datos del usuario
    $usuario = $sql->fetch_assoc();
    $nombreUsuario = $usuario['nombre'];
    $ID = $usuario['usuario_id'];
    $emailUsuario = $usuario['email'];
    $contrasena = $usuario['pass'];
} else {
    // Si no se encontraron resultados, establecer valores predeterminados
    $nombreUsuario = "Nombre de usuario no encontrado";
    $emailUsuario = "Correo electrónico no encontrado";
    $tipoUsuario = "Tipo de usuario no encontrado";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../../GLOBAL/CSS/AdmUser.css">
</head>
<body>

<header>
    <h1>Generar Ticket</h1>
  </header>
 <div class="titulo"><h2>MI PERFIL</h2></div>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../GLOBAL/CSS/AdmUser.css">
</head>
<body>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="profile-card">
            <img class="profile-image" src="https://via.placeholder.com/150" alt="Profile Image">
            <div class="profile-details">
                <form action="../CONTROLADOR/AdmUser.php" method="POST">
                   
                    <div class="form-group">
                        <label for="inputName"> Editar nombre:</label>
                        <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Nombre" value="<?php echo $nombreUsuario; ?>">
                    </div>
                 
                    <div class="form-group">
                        <label for="inputEmail">Editar correo electrónico:</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Correo electrónico" value="<?php echo $emailUsuario; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword">Editar contraseña:</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña" value="<?php echo $contrasena; ?>">
                    </div>
                    <br>
                   
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



</body>
</html>
