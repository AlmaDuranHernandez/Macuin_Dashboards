<?php
session_start();
include '../MODELO/Conexion.php';
include '../VISTAS/Cabecera.php';
include '../CONTROLADOR/AdmUser.php';


?>


    <link rel="stylesheet" href="../GLOBAL/CSS/Cliente.css">
</head>
<body>

    <div class="container">
        <h2>Tickets Solicitados</h2>

        <br> <br> <br> <br> <br> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Cancelar Ticket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $email = $_SESSION['usuario'];

                $sql = $conn->query("SELECT * FROM tickets WHERE usuario_id ='$ID'");
                if ($sql->num_rows > 0) {
                    $index = 1;
                    while ($ticket = $sql->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $index++ . "</td>";
                        echo "<td>" . $ticket['descripcion'] . "</td>"; 
                        echo "<td>" . $ticket['fecha'] . "</td>"; 
                        echo "<td>" . $ticket['estatus'] . "</td>"; 
                        echo "<td><a href='#' class='btn btn-danger'><i class='bi bi-trash3'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron tickets</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>
