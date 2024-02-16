<?php

include '../../../../htdocs/Proyecto/Macuin_Dashboards/VISTAS/Cabecera.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../GLOBAL/CSS/AdmUser.css">
    
</head>
<body>
    
    <header>
        <h1>Cliente</h1>
    </header>
   
    <br><br><br>
    <div class="container">
    <div class="profile-card">
        <img class="profile-image" src="https://via.placeholder.com/150" alt="Profile Image">
        <div class="profile-details">
            <input type="file" id="profileImageInput">
            <label for="profileImageInput"><i class="fas fa-camera"></i> <i class='bi bi-pencil'></i></label>
            <div class="form-group">
                <label for="inputName">Nombre:</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña:</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </div>
</div>
</body>
</html>
