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
<link rel="stylesheet" href="../../../Proyecto/Macuin_Dashboards/GLOBAL/CSS/consulta_ticket.css">
</head>
<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';


?>


<body style="margin-top: 100px;">

<!-- Agrega tu formulario de usuarios aquí -->
<table>
    <tr>
        <th>Id </th>
        <th>Fecha</th>
        <th>Estatus</th>
        <th>Clasificacion</th>
        <th>Asignado</th>
        <th></th>
    </tr>
    <tr>
        <td>1</td>
        <td>********</td>
        <td>********</td>
        <td>Departamento A</td>
        <td> 
        </td>
     
  

        
        <td>
            <button type="button" >Eliminar</button>

            <!-- Botón para abrir el modal de registro -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#descripcionModal">Editar</button>

          <!-- Ventana Modal -->
<div class="modal fade" id="descripcionModal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <!-- Encabezado de la ventana modal -->
    <div class="modal-header">
        <h4 class="modal-title">Ayuda</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Cuerpo de la ventana modal -->
    <div class="modal-body">
        
        <form>
            <div class="form-group">
                <label for="usuario">usuario:</label>
                <input type="text" class="form-control" id="usuario">
            </div>
            <div class="form-group">
                <label for="Fecha">Fecha:</label>
                <input type="text" class="form-control" id="usuario">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" rows="5" style="font-size: 10px;"></textarea>
            </div>
        </form>
        <p class="m-2">Clasificacion:</p>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contacto
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Fallas de office</a>
            <a class="dropdown-item" href="#">Fallas de red</a>
            <a class="dropdown-item" href="#">Errores de software</a>
            <a class="dropdown-item" href="#">Errores de hardware</a>
            <a class="dropdown-item" href="#">mantenimiento preventivo</a>
        </div>
        <p class="m-2">Estatus:</p>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            *
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Activo</a>
            <a class="dropdown-item" href="#">Pendiente</a>
            <a class="dropdown-item" href="#">Progreso</a>
            <a class="dropdown-item" href="#">Finalizado</a>
        </div>
        <p class="m-2">Auxiliar:</p>
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contacto
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Cliente</a>
            <a class="dropdown-item" href="#">Auxiliar de soporte</a>
            <a class="dropdown-item" href="#">Jefe de soporte</a>
        </div>
    </div>
    
</div>
</div>
</div>

            
<!-- Botón para abrir el modal de registro -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#comentarModal">Comentar</button>
<!-- Ventana Modal -->
<div class="modal fade" id="comentarModal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <!-- Encabezado de la ventana modal -->
    <div class="modal-header">
        <h4 class="modal-title">Comentario</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Cuerpo de la ventana modal -->
    <div class="modal-body">
        <p class="m-2">Información de contacto:</p>
        <div class="dropdown">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contacto
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Cliente</a>
                <a class="dropdown-item" href="#">Auxiliar de soporte</a>
                <a class="dropdown-item" href="#">Jefe de soporte</a>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="texto">Texto:</label>
            <textarea class="form-control" id="texto" rows="5"></textarea>
        </div>
    </div>
    <!-- Pie de la ventana modal -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
    </div>
</div>
</div>
</div>
</div>

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