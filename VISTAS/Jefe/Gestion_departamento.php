<?php
    include '../../CONTROLADOR/Jefe/obtener_departamentos.php';
    include '../../MODELO/Conexion.php';
?>

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
    <link rel="stylesheet" href="../../GLOBAL/CSS/Jefe_sop.css">
</head>
<body> 
    <div class="container">
        <h1>Departamentos</h1>
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
                        <form action="../../CONTROLADOR/Jefe/registrar_departamento.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento">
                            </div>
                            <!-- Botones del formulario -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>
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
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroModal">Registro</button>
        </div>

        <!-- Tabla de departamentos -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departamentos as $departamento) : ?>
                    <tr>
                        <td><?php echo $departamento['id']; ?></td>
                        <td><?php echo $departamento['departamento']; ?></td>
                        <td>
                            <!-- Botón de editar -->
                            <button type="button" class="btn btn-primary editar-btn" data-toggle="modal" data-target="#editarModal" data-id="<?php echo $departamento['id']; ?>">Editar</button>
                            <!-- Botón de borrar -->
                            <a href="../../CONTROLADOR/Jefe/borrar_departamento.php?borrar_departamento=<?php echo $departamento['id']; ?>" class="btn btn-danger" role="button">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      <!-- Modal de edición -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form id="form-editar-departamento" action="../../CONTROLADOR/Jefe/actualizar_departamento.php" method="POST">
                    <label for="nombre_departamento">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento">
                    <!-- Input oculto para almacenar el ID del departamento -->
                    <input type="hidden" id="departamento_id" name="departamento_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" form="form-editar-departamento">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar el modal y pasar el ID del departamento -->
<script>
    $(document).ready(function() {
        $('#editarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var departamentoId = button.data('id');
            var modal = $(this);
            modal.find('#departamento_id').val(departamentoId);
        });
    });
</script>

</body>
</html>
