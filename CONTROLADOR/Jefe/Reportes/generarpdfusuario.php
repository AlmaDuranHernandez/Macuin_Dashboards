<?php
// Incluir el archivo de conexión a la base de datos
include '../../../MODELO/Conexion.php';
require_once '../../../vendor/autoload.php'; // Incluye autoload.php de DomPDF
use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Inicializa el contenido HTML
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Tickets para Auxiliar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 200px;
        }
        .tickets {
            margin-bottom: 20px;
        }
        .tickets h2 {
            font-size: 24px;
            color: #666;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>';

// Logo
$html .= '<div class="logo">';
$html .= '<img src="data:image/png;base64,' . base64_encode(file_get_contents("../../../GLOBAL/PHOTO/logo.png")) . '" class="logo">';
$html .= '</div>';

// Título grande en medio
$html .= '<h1>Reporte de Tickets para Auxiliar</h1>';

// Obtener el ID del auxiliar seleccionado (Asegúrate de validar y limpiar este valor para evitar inyecciones SQL)
$auxiliar_id = $_POST['auxiliar'];

// Consulta para obtener el nombre del auxiliar
$sql_nombre_auxiliar = "SELECT nombre FROM usuario WHERE usuario_id = $auxiliar_id";
$result_nombre_auxiliar = $conn->query($sql_nombre_auxiliar);

// Verificar si se encontró el nombre del auxiliar
if ($result_nombre_auxiliar && $result_nombre_auxiliar->num_rows > 0) {
    $row_nombre_auxiliar = $result_nombre_auxiliar->fetch_assoc();
    $nombre_auxiliar = $row_nombre_auxiliar['nombre'];

    // Consulta para obtener los tickets del auxiliar seleccionado
    $sql_tickets_auxiliar = "SELECT t.*, u.nombre AS nombre_auxiliar
                             FROM tickets t
                             INNER JOIN usuario u ON t.id_auxiliar = u.usuario_id
                             WHERE t.id_auxiliar = $auxiliar_id";
    $result_tickets_auxiliar = $conn->query($sql_tickets_auxiliar);

    // Verificar si se encontraron tickets del auxiliar
    if ($result_tickets_auxiliar->num_rows > 0) {
        $html .= '<div class="tickets">';
        $html .= '<h2>Tickets del Auxiliar: ' . $nombre_auxiliar . '</h2>'; // Mostrar el nombre del auxiliar en el título
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>ID de Ticket</th>';
        $html .= '<th>Descripción</th>';
        $html .= '<th>Fecha</th>';
        $html .= '<th>Estatus</th>';
        $html .= '<th>Clasificación</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        // Iterar sobre cada ticket del auxiliar y agregar una fila a la tabla
        while ($row_ticket_auxiliar = $result_tickets_auxiliar->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row_ticket_auxiliar['ticket_id'] . '</td>';
            $html .= '<td>' . $row_ticket_auxiliar['descripcion'] . '</td>';
            $html .= '<td>' . $row_ticket_auxiliar['fecha'] . '</td>';
            $html .= '<td>' . $row_ticket_auxiliar['estatus'] . '</td>';
            $html .= '<td>' . $row_ticket_auxiliar['clasificacion'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
    } else {
        $html .= '<p>No hay tickets asociados al auxiliar seleccionado.</p>';
    }
} else {
    $html .= '<p>No se encontró el nombre del auxiliar.</p>';
}

// Cierra el contenido HTML
$html .= '</body></html>';

// Carga el HTML en Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configura opciones de Dompdf (como tamaño de página, orientación, etc.)
$dompdf->setPaper('A4', 'portrait');

// Renderiza el HTML como PDF
$dompdf->render();

// Genera el PDF y lo muestra en el navegador
$dompdf->stream("reporte_tickets_auxiliar.pdf", array("Attachment" => false));
?>
