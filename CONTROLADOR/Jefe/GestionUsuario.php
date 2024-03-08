<!-- Agrega tu formulario de usuarios aquí -->

<!-- Ventana Modal para Editar -->
<div class="modal fade" id="editarModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Encabezado de la ventana modal -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Cuerpo de la ventana modal -->
            <div class="modal-body">
                <form action="GestionUsuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" id="rol" name="rol">
                            <!-- Aquí se llenará con opciones desde la base de datos -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento:</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <!-- Aquí se llenará con opciones desde la base de datos -->
                        </select>
                    </div>
                    <input type="hidden" name="actualizar_usuario" value="1">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
