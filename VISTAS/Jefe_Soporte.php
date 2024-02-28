<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/Jefe_sop.css">
    
  
    
</head>
<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';


?>
<body style="margin-top: 100px;"> 
<title>Agregar usuarios</title>
<body>
   
    <h1>Agregar usuarios</h1>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroModal">
        Registro
    </button>
  
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
                    </form>
                </div>
                <!-- Pie de la ventana modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Buscador -->
    <div class="search-container">
        <!-- Campo de entrada del buscador -->
        <input type="text" class="search-input" placeholder="Buscar...">
        <!-- Botón de búsqueda -->
        <button type="submit" class="search-button">Buscar</button>
    </div>
    
    <!-- Tabla de usuarios -->
    <table>
        <tr>
            <th>Id </th>
            <th>Departamento</th>
            <th></th>
        </tr>
        <tr>
            <td>1</td>
            <td>********</td>
            <td>           
                <button type="button" >Borrar</button>
       <!-- Botón para abrir el modal de registro -->
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#edicionModal">
            Editar
            
        </button>


        <!-- Ventana Modal -->
<div class="modal fade" id="edicionModal">
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
                        <label for="Departamento">Departamento:</label>
                        <input type="text" class="form-control" id="usuario">
                    </div>
                    
                </form>
            </div>
            
            <!-- Pie de la ventana modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
            
        </div>
    </div>
</div>

            </td>
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