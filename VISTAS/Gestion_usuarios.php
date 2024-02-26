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
   </head>
<body>

    

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

    <script>
        function borrarUsuario(userId) {
            // Implementa la lógica para borrar el usuario con el id proporcionado
            console.log("Borrar usuario con ID: " + userId);
        }

        function editarUsuario(userId) {
            // Implementa la lógica para editar el usuario con el id proporcionado
            console.log("Editar usuario con ID: " + userId);
        }
    </script>
</body>
</html>
