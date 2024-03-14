<?php
    // Incluir la conexión a la base de datos
    include '../../VISTAS/General/CabeceraJefe.php';
    include '../../MODELO/Conexion.php';
    include '../../CONTROLADOR/Jefe/Ticket/Consulta_Ticket.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tickets</title>
    <link rel="stylesheet" href="../../GLOBAL/CSS/Jefe_sop.css">
</head>
<body> 
<div class="container"><br><br><br><br><br><br>
    <h1>Gestión de Tickets</h1><br><br><br><br><br>
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
                        <!-- Formulario para enviar el ID del ticket al controlador -->
                            <!-- Formulario para enviar el ID del ticket al controlador -->
                        <form id="formTicketId_<?php echo $ticket['ticket_id']; ?>" method="POST" action="../../CONTROLADOR/Jefe/AsignarAux.php">
                            <input type="hidden" name="ticket_id_modal" value="<?php echo $ticket['ticket_id']; ?>">
                            <button type="button" class="btn btn-primary abrir-modal" data-ticketid="<?php echo $ticket['ticket_id']; ?>" data-toggle="modal" data-target="#añadirAuxiliarModal"><i class="bi bi-person-plus-fill"></i></button>
                        </form>
                        <form id="formEliminarTicket_<?php echo $ticket['ticket_id']; ?>" method="POST" action="../../CONTROLADOR/Jefe/Ticket/EliminarTicket.php">
                             <input type="hidden" name="ticket_id_eliminar" value="<?php echo $ticket['ticket_id']; ?>">
                             <button type="submit" class="btn btn-danger eliminar-ticket"><i class="bi bi-trash-fill"></i></button>
                         </form>
                         <button type="button" class="btn btn-primary abrir-modal-comentario" data-ticketid="<?php echo $ticket['ticket_id']; ?>" data-toggle="modal" data-target="#añadirComentarioModal"> <i class="bi bi-envelope"></i></button>
                         
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="añadirAuxiliarModal" tabindex="-1" role="dialog" aria-labelledby="añadirAuxiliarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="añadirAuxiliarModalLabel">Añadir Auxiliar al Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="añadirAuxiliarForm" method="POST" action="../../CONTROLADOR/Jefe/AsignarAux.php">
                <div class="modal-body">
                    <!-- Campo oculto para almacenar el id del ticket -->
                    <input type="hidden" id="ticket_id_modal" name="ticket_id_modal" value="">
                    <div class="form-group">
                        <label for="auxiliar">Seleccionar Auxiliar:</label>
                        <select class="form-control" id="auxiliar" name="id_auxiliar">
                            <option value="">Seleccionar Auxiliar</option>
                            <?php 
                                $auxiliares = BuscarAuxiliares(); // Obtener los auxiliares
                                foreach ($auxiliares as $auxiliar) {
                                    $selected = ($idAuxiliarSeleccionado == $auxiliar['usuario_id']) ? 'selected' : '';
                                    echo "<option value=\"" . $auxiliar['usuario_id'] . "\" $selected>" . $auxiliar['nombre'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="guardar_cambios_modal">Añadir Auxiliar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Agregar un botón para abrir el modal -->


<!-- Modal para agregar comentario -->
<div class="modal fade" id="añadirComentarioModal" tabindex="-1" role="dialog" aria-labelledby="añadirComentarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="añadirComentarioModalLabel">Agregar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="añadirComentarioForm" method="POST" action="../../CONTROLADOR/Jefe/Ticket/AgregarComentario.php">
                <div class="modal-body">
                    <input type="hidden" id="ticket_id_comentario" name="ticket_id_comentario" value="">
                    <div class="form-group">
                        <label for="tipo">Seleccionar tipo:</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="cliente">Cliente</option>
                            <option value="auxiliar">Auxiliar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="guardar_comentario">Agregar Comentario</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Cuando se abra el modal, asigna el ID del ticket al campo oculto correspondiente
    $('.abrir-modal-comentario').on('click', function() {
        var ticketId = $(this).data('ticketid');
        $('#ticket_id_comentario').val(ticketId);
    });
</script>

<script>
    // Cuando se abra el modal, asigna el ID del ticket al campo oculto correspondiente
    $('.abrir-modal').on('click', function() {
        var ticketId = $(this).data('ticketid');
        $('#ticket_id_modal').val(ticketId);
    });
</script>
</body>
</html>
