<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  echo '<script>
  alert("Por favor inicia sesión");
  window.location = "";
  </script>';
  session_destroy();
  die();
} 

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/CabeceraJefe.php';




?>
<!DOCTYPE html>
<html lang="en">
<head>

   
    <link rel="stylesheet" href="../../GLOBAL/CSS/Gestion_usuarios.css">
</head>
<body> 
    <title>Gestion de usuarios</title><br><br><br><br><br><br><br>
    <h1>Gestion de Usuario</h1>
  


<select id="selectTabla">
    <option >Ninguna</option>
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
<div class="modal fade" id="EditarModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulario de Edición</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../CONTROLADOR/Jefe/actualizar.php" method="POST">
                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" name="roles">
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
                        <select class="form-control" name="departamentos">
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
                        <input type="text" class="form-control" id="nombre" name="nombres">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="emails">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="passs">
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
                    echo "<td>";
                    echo "<form action='../../CONTROLADOR/Jefe/Actualizar.php' method='POST'>";
                    echo "<input type='hidden' name='user_id' value='" . $row['usuario_id'] . "'>";
                    echo "<button class='editar-usuario' data-id='" . $row['usuario_id'] . "' type='button' data-toggle='modal' data-target='#EditarModal'><i class='bi bi-pencil'></i></button>";
                    echo "</form>";
                    echo "</td>";
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
                echo "<td>";
                echo "<form action='../../CONTROLADOR/Jefe/Actualizar.php' method='POST'>";
                echo "<input type='hidden' name='user_id' value='" . $row['usuario_id'] . "'>";
                echo "<button class='editar-usuario' data-id='" . $row['usuario_id'] . "' type='button' data-toggle='modal' data-target='#EditarModal'><i class='bi bi-pencil'></i></button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";

            }
            ?>
        </table>
    </div>
    <div id="tablaCliente" style="display:none;">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
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
                    echo "<button type='submit' name='eliminar'><i class='bi bi-trash3'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>";
                    echo "<form action='../../CONTROLADOR/Jefe/Actualizar.php' method='POST'>";
                    echo "<input type='hidden' name='user_id' value='" . $row['usuario_id'] . "'>";
                    echo "<button class='editar-usuario' data-id='" . $row['usuario_id'] . "' type='button' data-toggle='modal' data-target='#EditarModal'><i class='bi bi-pencil'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";

            }
            ?>
        </table>
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
</script>
