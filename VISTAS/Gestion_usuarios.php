<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/Gestion_usuarios.css">
    <title>Gestion usuarios</title>
    
</head>
<body>
<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';


?>
    <div class="box">
    <label for="Tipo de usuario">Tipo de usuario:</label>
    <select id="tipo de usuario">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
    </select>
    <button>Agregar</button>

    <table>
        <tr>
            <th>Id Usuario</th>
            <th>Contraseña</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <td>1</td>
            <td>********</td>
            <td>Departamento A</td>
            <td>
                <img src="delete_icon.png" alt="Borrar" class="delete-icon" onclick="borrarUsuario(1)">
                <img src="edit_icon.png" alt="Editar" class="edit-icon" onclick="editarUsuario(1)">
            </td>
        </tr>
        <!-- Puedes agregar más filas con datos de usuarios aquí -->
    </table>
</div>
    
    <div class="box">
        <h3>Gestión de Usuarios</h3>
        <div class="user-form">
            <label for="idUsuario">Id Usuario:</label>
            <input type="text" id="idUsuario" />
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" />
            <label for="password">Contraseña:</label>
            <input type="password" id="password" />
            <label for="departamento">Departamento:</label>
            <select id="departamento">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
            </select>
            <button>Agregar</button>
        </div>
    </div>
    <table>
        
    </table>
</body>
</html>
