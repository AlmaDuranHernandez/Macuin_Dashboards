<?php
    // Incluir la conexión a la base de datos
    include '../../MODELO/Conexion.php';
    include '../../CONTROLADOR/Jefe/Ticket/Consulta_Ticket.php';
    include '../../CONTROLADOR/Jefe/Ticket/editar_Gestion_Tickets.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="margin-top: 100px;">
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarEstadoModal" onclick="editarTicket(<?php echo $ticket['ticket_id']; ?>)">Editar</button>
                            <!-- Botón de eliminar -->
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para editar el estado de un ticket -->
    <div class="modal fade" id="editarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="editarEstadoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEstadoModalLabel">Editar Estado del Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario de edición -->
                    <form id="editarEstadoForm" method="POST" action="../../CONTROLADOR/Jefe/Tickets/editar_gestion_tickets.php">
                        <div class="form-group">
                            <label for="nuevoEstado">Nuevo Estado:</label>
                            <select class="form-control" id="nuevoEstado" name="nuevo_estado">
                                <option value="Abierto">Abierto</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Cerrado">Cerrado</option>
                            </select>
                        </div>
                        <input type="hidden" id="ticketId" name="ticket_id">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para editar el ticket -->
    <script>
        function editarTicket(ticketId) {
            document.getElementById("ticketId").value = ticketId;
        }
    </script>

</body>
</html>
