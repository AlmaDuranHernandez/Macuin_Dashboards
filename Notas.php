<?php
include '../General/Cabecera.php';
include '../../MODELO/Conexion.php';
include '../../CONTROLADOR/Jefe/GestionUsuario.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../GLOBAL/CSS/Gestion_usuarios.css">
</head>
<body> 
<br><br><br><br><br><br><br>
    <title>Gestion de usuarios</title>
    <h1>Gestion de Usuario</h1>
    <select>
        <option value="0">Selecciona Rol: </option>
        <?php
        // Consulta para obtener los roles desde la base de datos
        $sql = "SELECT * FROM roles";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['Descripcion'] . "</option>";
        }
        ?>
    </select>


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
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="rol">Rol:</label>
                            <select class="form-control" name="rol">
                                <option value="0">Selecciona Rol</option>
                                <?php
                                // Consulta para obtener los roles desde la base de datos
                                $sql = "SELECT * FROM roles";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['Descripcion'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento:</label>
                            <select class="form-control" name="departamento">
                                <option value="0">Selecciona Departamento:</option>
                                <?php
                                // Consulta para obtener los departamentos desde la base de datos
                                $sql = "SELECT * FROM departamentos";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['departamento'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <!-- Agrega aquí cualquier otro campo que necesites -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                echo "<a class='btn btn-primary' href='editar_usuario.php?id=" . $row['usuario_id'] . "'>Editar</a>";
                echo "<button class='btn btn-danger ml-2' onclick='abrirModalEliminar(" . $row['usuario_id'] . ")'>Eliminar</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
 
    <!-- Ventana Modal para Editar -->
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
                <form action="guardar_edicion.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <!-- Agrega los demás campos aquí -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
                    <div class="form-group">
                        <label for="departamento">Departamento:</label>
                        <select class="form-control" name="departamento">
                            <option value="0">Selecciona Departamento:</option>
                            <?php
                            // Consulta para obtener los departamentos desde la base de datos
                            $sql_departamentos = "SELECT * FROM departamentos";
                            $result_departamentos = $conn->query($sql_departamentos);
                            while ($row_departamentos = $result_departamentos->fetch_assoc()) {
                                echo "<option value='" . $row_departamentos['id'] . "'>" . $row_departamentos['departamento'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" name="rol">
                            <option value="0">Selecciona Rol</option>
                            <?php
                            // Consulta para obtener los roles desde la base de datos
                            $sql_roles = "SELECT * FROM roles";
                            $result_roles = $conn->query($sql_roles);
                            while ($row_roles = $result_roles->fetch_assoc()) {
                                echo "<option value='" . $row_roles['id'] . "'>" . $row_roles['Descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Agrega aquí cualquier otro campo que necesites -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Ventana Modal para Eliminar -->
    <div class="modal fade" id="eliminarModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Encabezado de la ventana modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Cuerpo de la ventana modal -->
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                </div>
                <!-- Pie de la ventana modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
