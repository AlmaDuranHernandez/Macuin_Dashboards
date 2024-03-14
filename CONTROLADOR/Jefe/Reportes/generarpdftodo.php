<?php
include '../../../MODELO/Conex.php';
require_once '../../../vendor/autoload.php'; // Incluye autoload.php de DomPDF
use Dompdf\Dompdf;

// Establecer la conexión a la base de datos
$conn = conectar();

// Consulta para obtener todos los tickets con la fecha, nombre del usuario, nombre del departamento y la descripción
$sql_tickets = "SELECT t.ticket_id, 
                    t.fecha,
                    u.nombre AS nombre_usuario,
                    d.departamento AS nombre_departamento,
                    t.descripcion
                FROM tickets t
                INNER JOIN usuario u ON t.usuario_id = u.usuario_id
                INNER JOIN departamentos d ON u.id_departamento = d.id";

// Consulta para contar el total de tickets
$sql_count_tickets = "SELECT COUNT(*) AS total_tickets FROM tickets";

// Ejecutar la consulta para obtener todos los tickets
$result_tickets = $conn->query($sql_tickets);

// Ejecutar la consulta para contar el total de tickets
$result_count_tickets = $conn->query($sql_count_tickets);
$count_tickets = $result_count_tickets->fetch_assoc()['total_tickets'];

// Iniciar el contenido HTML
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Todos los Tickets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Estilos personalizados */
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .table th,
    .table td {
        padding: 6px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
        font-size: 12px; /* Tamaño de letra ajustado */
    }
    .table th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-align: center;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-striped tbody tr:nth-of-type(even) {
        background-color: #fff;
    }
    .table-striped tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }
    .title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .logo {
        display: block;
        margin: 0 auto;
        width: 150px;
        height: auto;
        margin-bottom: 20px;
    }
</style>
</head>
<body>';

// Logo
$html .= '<img src="data:image/png;base64,' . base64_encode(file_get_contents("../../../GLOBAL/PHOTO/logo.png")) . '" class="logo">';

// Título
$html .= '<div class="title">Reporte de Todos los Tickets</div>';

// Mostrar el conteo de tickets
$html .= '<p>Total de Tickets: ' . $count_tickets . '</p>';

// Construir la tabla HTML con todos los tickets
if ($result_tickets->num_rows > 0) {
    // Iniciar la tabla HTML con Bootstrap
    $html .= '<div class="container mt-4">';
    $html .= '<table class="table table-striped">';
    $html .= '<thead class="thead-dark">';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Descripción</th>';
    $html .= '<th>Fecha Creacion</th>';
    $html .= '<th>Nombre Usuario</th>';
    $html .= '<th>Departamento</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';

    // Iterar sobre cada ticket y agregar una fila a la tabla
    while ($row_ticket = $result_tickets->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row_ticket['ticket_id'] . '</td>';
        $html .= '<td>' . $row_ticket['descripcion'] . '</td>';
        $html .= '<td>' . $row_ticket['fecha'] . '</td>';
        $html .= '<td>' . $row_ticket['nombre_usuario'] . '</td>';
        $html .= '<td>' . $row_ticket['nombre_departamento'] . '</td>';
        $html .= '</tr>';
    }

    // Cerrar la tabla HTML
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</div>';
} else {
    // Si no se encontraron tickets, mostrar un mensaje
    $html .= '<p class="container mt-4">No hay tickets en la base de datos.</p>';
}

// Cerrar el contenido HTML
$html .= '</body></html>';

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// Renderizar el PDF
$dompdf->render();

// Generar el PDF y mostrarlo en el navegador
$dompdf->stream('reporte_tickets.pdf', array('Attachment' => 0));

// Cerrar la conexión a la base de datos al finalizar
cerrarConexion($conn);

?>