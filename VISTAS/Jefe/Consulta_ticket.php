<?php
    // Incluir la conexión a la base de datos
    include '../../MODELO/Conexion.php';
    include '../../CONTROLADOR/Jefe/Ticket/Consulta_Ticket.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../GLOBAL/CSS/Jefe_sop.css">
</head>
<body style="margin-top: 200px;"> 
    <?php include '../../VISTAS/General/Cabecera.php'; ?>

    <div class="container">
        <h1>Gestión de Tickets</h1>
        <!-- Tabla de tickets -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Clasificación</th>
                    <th>Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket) : ?>
                    <tr>
                        <td><?php echo $ticket['ticket_id']; ?></td>
                        <td><?php echo $ticket['fecha']; ?></td>
                        <td><?php echo $ticket['estatus']; ?></td>
                        <td><?php echo $ticket['clasificacion']; ?></td>
                        <td><?php echo obtenerNombreAuxiliar($ticket['id_auxiliar']); ?></td>
                        <td>
                            <!-- Botón de editar -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#añadirAuxiliarModal" data-ticketid="<?php echo $ticket['ticket_id']; ?>">Editar</button>

                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para añadir auxiliar de un ticket -->
    <div class="modal fade" id="añadirAuxiliarModal" tabindex="-1" role="dialog" aria-labelledby="añadirAuxiliarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirAuxiliarModalLabel">Añadir Auxiliar al Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

     


<div class="modal-body">
    <!-- Contenido del formulario de añadir auxiliar -->
    <form id="añadirAuxiliarForm" method="POST" action="">
        <div class="form-group">
            <label for="ticket_id">ID del Ticket:</label>
            <input type="text" id="ticket_id_modal" name="ticket_id_modal" value="">
        </div>
        <div class="form-group">
            <label for="auxiliar">Seleccionar Auxiliar:</label>
            <input class="form-control" id="auxiliar" name="id_auxiliar">
                <option value="">Seleccionar Auxiliar</option>
                <?php 
                    $auxiliares = BuscarAuxiliares(); // Obtener los auxiliares
                    foreach ($auxiliares as $auxiliar) {
                        // Marcar como seleccionado el auxiliar previamente seleccionado
                        $selected = ($idAuxiliarSeleccionado == $auxiliar['usuario_id']) ? 'selected' : '';
                        echo "<option value=\"" . $auxiliar['usuario_id'] . "\" $selected>" . $auxiliar['nombre'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="Añadir_Auxiliar" action="../../CONTROLADOR/Jefe/InsertarAuxiliar.php">Añadir Auxiliar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </form>
</div>
<script>
    function imprimirUsuarioId() {
        var auxiliarSelect = document.getElementById("auxiliar");
        var usuarioIdSeleccionado = auxiliarSelect.value;
        console.log('Usuario ID seleccionado:', usuarioIdSeleccionado);
    }
</script>

</body>
</html>
