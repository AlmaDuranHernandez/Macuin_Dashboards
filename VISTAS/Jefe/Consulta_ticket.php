<?php

// Incluir el archivo de conexión
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
</head>
<body style="margin-top: 100px;">
    <div class="container">
        <h1>Gestión de Tickets</h1>

        <div id="alerta" class="alert alert-dismissible fade show" role="alert" style="display: none;">
    <strong>¡Error!</strong> No se pudo realizar la acción solicitada.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


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
                    <h5 class="modal-title" id="editarEstadoModalLabel">Asignar Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            
                    <!-- Formulario de asignación de auxiliar -->
                    <form id="asignarAuxiliarForm" method="POST" action="">
                        <div class="form-group">
                            <label for="auxiliar">Seleccionar Auxiliar:</label>
                            <select class="form-control" id="auxiliar" name="id_auxiliar">
                                    <?php foreach($auxiliares as $auxiliar): ?>
                                        <option value="<?php echo $auxiliar['usuario_id']; ?>"><?php echo $auxiliar['nombre']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                        </div>
                        <input type="hidden" id="ticketId" name="id_ticket" value="<?php echo $id_del_ticket_a_asignar; ?>">
                        <button type="submit" class="btn btn-primary">Asignar Auxiliar</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
