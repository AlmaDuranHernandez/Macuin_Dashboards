<?php
include '../../VISTAS/General/Cabecera copy.php';
include '../../MODELO/Conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Agrega los siguientes enlaces para incluir Bootstrap y jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../GLOBAL/CSS/Gestion_usuarios.css">
</head>
<body> 
    <title>Gestion de usuarios</title><br><br><br><br><br><br><br>
    <h1>Gestion de Usuario</h1>


<select id="selectTabla">
    <option >Selecciona un Rol: </option>
    <option value="administrador">Administrador</option>
    <option value="auxiliar">Auxiliar</option>
    <option value="cliente">Cliente</option>
</select>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroModal">
        Registro
</button>



 <div class="modal fade" id="registroModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Formulario de Registro</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Registrar Usuario -->
                <div class="modal-body">
                    <form action="../../CONTROLADOR/Jefe/GestionUsuario.php" method="POST">
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
                            <input type="password" class="form-control" id="password" name="pass">
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

<br><br><br><br>

<div id="tablas">
    <div id="tablaAdministrador" style="display:none;">
        <table>
                    <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
                <?php
                $sql = "SELECT usuario_id, nombre, email FROM usuario INNER JOIN roles ON id_rol = id WHERE Descripcion = 'Administrador'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['usuario_id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    echo "<form action='../../CONTROLADOR/Jefe/Eliminar.php' method='POST'>";
                    echo "<input type='hidden' name='usuario_id' value='" . $row['usuario_id'] . "'>";
                    echo "<button type='submit' name='eliminar'><i class='bi bi-trash3'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td><button type='button' class='editar-btn' data-toggle='modal' data-target='#modalEditar'><i class='bi bi-pencil'></i></button></td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </div>


    <div id="tablaAuxiliar" style="display:none;">
        <table>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            <?php
            $sql = "SELECT usuario_id, nombre, email FROM usuario INNER JOIN roles ON id_rol = id WHERE Descripcion = 'Auxiliar'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['usuario_id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                echo "<form action='../../CONTROLADOR/Jefe/Eliminar.php' method='POST'>";
                echo "<input type='hidden' name='usuario_id' value='" . $row['usuario_id'] . "'>";
                echo "<button type='submit' name='eliminar'><i class='bi bi-trash3'></i></button>";
                echo "</form>";
                echo "</td>";
                echo "<td><button type='button' class='editar-btn' data-toggle='modal' data-target='#modalEditar'><i class='bi bi-pencil'></i></button></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


    <div id="tablaCliente" style="display:none;">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT usuario_id, nombre, email FROM usuario INNER JOIN roles ON id_rol = id WHERE Descripcion = 'Cliente'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['usuario_id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                echo "<form action='../../CONTROLADOR/Jefe/Eliminar.php' method='POST'>";
                echo "<input type='hidden' name='usuario_id' value='" . $row['usuario_id'] . "'>";
                echo "<button type='submit' name='eliminar' class='btn btn-danger'><i class='bi bi-trash'></i></button>";
                echo "</form>";
                echo "</td>";
                echo "<td><button type='button' class='btn btn-primary editar-btn' data-toggle='modal' data-target='#modalEditar'><i class='bi bi-pencil'></i></button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../CONTROLADOR/Jefe/GestionUsuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
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
                    <!-- Agrega aquí cualquier otro campo que necesites -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var selectTabla = document.getElementById("selectTabla");
    var tablas = document.getElementById("tablas").children;

    selectTabla.addEventListener("change", function() {
        var selectedTablaId = selectTabla.value;
        for (var i = 0; i < tablas.length; i++) {
            if (tablas[i].id === "tabla" + selectedTablaId.charAt(0).toUpperCase() + selectedTablaId.slice(1)) {
                tablas[i].style.display = "block";
            } else {
                tablas[i].style.display = "none";
            }
        }
    });

        // Obtén el botón por su id
        var generarReporteBtn = document.getElementById("generarReporteBtn");

        // Agrega un evento de clic al botón
        generarReporteBtn.addEventListener("click", function() {
            // Redirecciona a tu controlador generarpdf.php
            window.location.href = "../../CONTROLADOR/Jefe/Reportes/generarpdfusuario.php";
        });




</script>

</body>
</html>


