<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  echo '<script>
  alert("Por favor inicia sesión");
  window.location = "../CC/Vista/Login.php";
  </script>';
  session_destroy();
  die();
} 

include '../../MODELO/Conexion.php';
include '../../VISTAS/General/Cabecera.php';
include '../../CONTROLADOR/Cliente/Cliente.php';
$email = $_SESSION['usuario'];

$sql = $conn->query("SELECT usuario_id FROM usuario WHERE email='$email'");
if ($sql->num_rows > 0) {
    $usuario = $sql->fetch_assoc();
    $ID = $usuario['usuario_id'];
  
} else {
    $nombreUsuario = "Nombre de usuario no encontrado";

}



?>


    <link rel="stylesheet" href="../../GLOBAL/CSS/Cliente.css">
</head>
<body>

    
     <div class="TITLE">
        <h1>REPORTES GENERADOS</h1>
     </div>
      <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
              
                    <th>CLASIFICACIÓN</th>
                    <th>FECHA</th>
                    <th>ESTATUS</th>
                    <th>ELIMINAR TICKET</th>
                </tr>
            </thead>
            <tbody>
                <?php
         
                $sql = $conn->query("SELECT * FROM tickets WHERE usuario_id ='$ID'");
                if ($sql->num_rows > 0) {
                    $index = 1;
                    while ($ticket = $sql->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $index++ . "</td>";
                        
                        echo "<td>" . $ticket['clasificacion'] . "</td>"; 
                        echo "<td>" . $ticket['fecha'] . "</td>"; 
                        echo "<td>" . $ticket['estatus'] . "</td>"; 
                        echo "<td>"; // Abre la celda para el botón de eliminar
                        echo "<form method='post'>"; // Abre el formulario de eliminación
                        echo "<input type='hidden' name='eliminar_ticket' value='" . $ticket['ticket_id'] . "'>";
                        echo "<button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que quieres eliminar el ticket " . $ticket['ticket_id'] . "?\")'><i class='bi bi-trash3'></i></button>";

                        echo "</form>"; // Cierra el formulario de eliminación
                        echo "</td>"; // Cierra la celda para el botón de eliminar
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
