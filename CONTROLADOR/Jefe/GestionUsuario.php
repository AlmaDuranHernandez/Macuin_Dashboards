<!-- Agrega tu formulario de usuarios aquí -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Consulta para obtener los usuarios desde la base de datos
        $sql = "SELECT u.usuario_id, u.nombre, u.email, r.Descripcion as rol, d.departamento FROM usuario u 
                INNER JOIN roles r ON u.id_rol = r.id INNER JOIN departamentos d ON u.id_departamento = d.id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['usuario_id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['rol'] . "</td>";
            echo "<td>" . $row['departamento'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop" . $row['usuario_id'] . "'>Editar</button>";
            echo "<button class='btn btn-danger ml-2' onclick='abrirModalEliminar(" . $row['usuario_id'] . ")'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

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
