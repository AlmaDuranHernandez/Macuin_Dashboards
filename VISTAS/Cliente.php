<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="../GLOBAL/CSS/cliente.css">

</head>
<body>
<?php
include '../../Macuin_Dashboards/VISTAS/Cabecera.php';
include '../../Macuin_Dashboards/MODELO/Conexion.php';


$sql = "SELECT * FROM tickets";
$resultado = $conn->query($sql);


$tickets = [];
if ($resultado->num_rows > 0) {
    // Recorre los resultados y los almacena en el arreglo $tickets
    while ($fila = $resultado->fetch_assoc()) {
        $tickets[] = $fila;
    }
}

?>
    <header>
        <h1>Cliente</h1>
    </header>
   

<br> <br> <br> 

    <div class="TITULO">

      <h2>TICKES SOLICITADOS</h2>

    </div>
    <br> <br>     <br> <br> 
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DESCRIPCION</th>
                <th>FECHA</th>
                <th>ESTATUS</th>
                <th>CANCELAR TICKET</th>
                    
            </tr>
        </thead>
        <tbody>
           <tr>
           <?php
       
        foreach ($tickets as $index => $ticket) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $ticket['descripcion'] . "</td>"; 
            echo "<td>" . $ticket['fecha'] . "</td>"; 
            echo "<td>" . $ticket['estatus'] . "</td>"; 
            echo "<td class='aling-center'>";
            echo "<a href='#' class='btn delete-btn'><i class='bi bi-trash3'></a>";
            echo "<a href='#' class='btn delete-btn'><i class='bi bi-pencil'></i></a>";
            echo "</td>";
            echo "</tr>";
            
        }
        ?>
           
        </tbody>
    </table>

</body>
</html>
