<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Modal</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/Gestion_usuarios.css">
</head>
<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';


?>
<body style="margin-top: 100px;"> 


    <title>Gestion de usuarios</title>
    <h1>Gestion de Usuario</h1>
    <p class="m-2">Información de contacto:</p>
    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Contacto
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Cliente</a>
        <a class="dropdown-item" href="#">Auxiliar de soporte</a>
        <a class="dropdown-item" href="#">Jefe de soporte</a>
    </div>
</div>

<!-- Botón para abrir el modal de registro -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroModal">
    Registro
</button>

</div>
  
  <!-- Ventana Modal -->
  <div class="modal fade" id="registroModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Encabezado de la ventana modal -->
        <div class="modal-header">
          <h4 class="modal-title">Formulario de Registro</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Cuerpo de la ventana modal -->
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control" id="password">
            </div>
          </form>
        </div>
        
        <!-- Pie de la ventana modal -->
        <div class="modal-footer">
        <button type="button" class="" >Editar</button>
          <button type="button" class="">Borrar</button>
        </div>
        
      </div>
    </div>
  </div>
  

<body>
   
    <h2>Bienvenido</h2>
    
    <!-- Agrega tu formulario de usuarios aquí -->

    <table>
        <tr>
            <th>Id </th>
            <th>Usuario</th>
            <th>Departamento</th>
            <th></th>
        </tr>
        <tr>
            <td>1</td>
            <td>********</td>
            <td>Departamento A</td>
            <td>
            <button type="button"  >Cerrar</button>
                    <button type="button">Registrarse</button>
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
