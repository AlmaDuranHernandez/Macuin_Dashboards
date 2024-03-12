<?php
    include '../../CONTROLADOR/Jefe/obtener_departamentos.php';
    include '../../MODELO/Conexion.php';
    include '../../CONTROLADOR/Jefe/actualizar_departamento.php';
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
    <link rel="stylesheet" href="../../GLOBAL/CSS/Cabecera.css">
</head>
<body style="margin-top: 100px;> 
    <?php include '../../VISTAS/General/Cabecera.php'; ?>


    <div class="container mt-5">
    <h1>Departamentos</h1>

    <!-- Resto de tu contenido HTML -->
</div>


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
            <input type="text" class="search-input" placeholder="Buscar...">
            <button type="submit" class="search-button">Buscar</button>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroModal">Registro</button>
        </div>

        <!-- Tabla de departamentos -->
        <table class="table mt-3">
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
                            <button type="button" class="btn btn-primary editar-btn" data-toggle="modal" data-target="#editardepartamento" data-id="<?php echo $departamento['id']; ?>">Editar</button>
                            <!-- Botón de borrar -->
                            <button type="button" class="btn btn-danger borrar-btn" data-toggle="modal" data-target="#ModalBorrar" data-id="<?php echo $departamento['id']; ?>">Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal de edición de departamento -->
        <div class="modal fade" id="editardepartamento" tabindex="-1" role="dialog" aria-labelledby="editardepartamento" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarTicketModalLabel">Editar Nombre Departamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../../CONTROLADOR/Jefe/actualizar_departamento.php" method="POST">
                            <div class="form-group">
                                <label for="nuevoNombre">Nuevo Nombre:</label>
                                <input type="text" class="form-control" id="nuevoNombre" name="nuevo_nombre">
                            </div>
                            <input type="hidden" id="departamento_id" name="departamento_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Borrar -->
        <div class="modal fade" id="ModalBorrar" tabindex="-1" role="dialog" aria-labelledby="ModalBorrar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalBorrarTitle">Borrar Departamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que quieres borrar el departamento?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a id="confirmar-borrar" href="#" class="btn btn-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editar-btn').click(function() {
                var departamento_id = $(this).data('id');
                $('#departamento_id').val(departamento_id);
            });

            $('.borrar-btn').click(function() {
                var departamento_id = $(this).data('id');
                $('#confirmar-borrar').attr('href', '../../CONTROLADOR/Jefe/borrar_departamento.php?borrar_departamento=' + departamento_id);
            });
        });
    </script>


        });
    </script>
</body>
</html>

