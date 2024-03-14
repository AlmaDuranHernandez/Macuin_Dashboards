<?php
include '../../../MODELO/Conex.php';
require_once '../../../vendor/autoload.php'; // Incluye autoload.php de DomPDF
use Dompdf\Dompdf;

// Establecer la conexión a la base de datos
$conn = conectar();

// Verificar si se ha enviado el formulario y el departamento seleccionado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["departamento"])) {
    // Obtener el ID del departamento seleccionado
    $departamento_id = $_POST["departamento"];

    // Consulta para obtener el nombre del departamento seleccionado
    $sql_nombre_departamento = "SELECT departamento FROM departamentos WHERE id = $departamento_id";
    $result_nombre_departamento = $conn->query($sql_nombre_departamento);
    $row_nombre_departamento = $result_nombre_departamento->fetch_assoc();
    $nombre_departamento = $row_nombre_departamento['departamento'];

    // Consulta para obtener los tickets del departamento seleccionado
    $sql_tickets = "SELECT t.*, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha_formato, 
                           ucreador.nombre AS usuario_creador, 
                           uauxiliar.nombre AS auxiliar_asignado
                    FROM tickets t
                    INNER JOIN usuario ucreador ON t.usuario_id = ucreador.usuario_id
                    LEFT JOIN usuario uauxiliar ON t.id_auxiliar = uauxiliar.usuario_id
                    WHERE t.departamento = $departamento_id";

    // Ejecutar la consulta para obtener los tickets
    $result_tickets = $conn->query($sql_tickets);

    // Iniciar el contenido HTML
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte de Departamento: ' . $nombre_departamento . '</title>
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
                padding: 8px;
                border: 1px solid #dee2e6;
                vertical-align: middle;
                font-size: 14px; /* Tamaño de letra ajustado */
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
            .subtitle {
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            .logo {
                position: center;
                top: 20px;
                left: 20px;
                width: 150px;
                height: auto;
            }
        </style>
    </head>
    <body>';

    // Logo
    $html .= '<img src="data:image/png;base64,' . base64_encode(file_get_contents("../../../GLOBAL/PHOTO/logo.png")) . '" class="logo">';

    // Título y subtítulo
    $html .= '<div class="title">Reportes por Departamento</div>';
    $html .= '<div class="subtitle">Departamento: ' . $nombre_departamento . '</div>';

    // Construir la tabla HTML con los tickets
    if ($result_tickets->num_rows > 0) {
        // Iniciar la tabla HTML con Bootstrap
        $html .= '<div class="container mt-4">';
        $html .= '<table class="table table-striped">';
        $html .= '<thead class="thead-dark">';
        $html .= '<tr>';
        $html .= '<th>ID</th>';
        $html .= '<th>Fecha</th>';
        $html .= '<th>Descripción</th>';
        $html .= '<th>Status</th>';
        $html .= '<th>Clasificación</th>';
        $html .= '<th>Usuario Creador</th>';
        $html .= '<th>Auxiliar Asignado</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        // Iterar sobre cada ticket y agregar una fila a la tabla
        while ($row_ticket = $result_tickets->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row_ticket['ticket_id'] . '</td>';
            $html .= '<td>' . $row_ticket['fecha_formato'] . '</td>';
            $html .= '<td>' . $row_ticket['descripcion'] . '</td>';
            $html .= '<td>' . $row_ticket['estatus'] . '</td>';
            $html .= '<td>' . $row_ticket['clasificacion'] . '</td>';
            $html .= '<td>' . $row_ticket['usuario_creador'] . '</td>';
            $html .= '<td>' . ($row_ticket['auxiliar_asignado'] ? $row_ticket['auxiliar_asignado'] : 'No asignado') . '</td>';
            $html .= '</tr>';
        }

        // Cerrar la tabla HTML
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
    } else {
        // Si no se encontraron tickets, mostrar un mensaje
        $html .= '<p class="container mt-4">No hay tickets asignados a este departamento.</p>';
    }

    // Cerrar el contenido HTML
    $html .= '</body></html>';

    // Crear una instancia de Dompdf
    $dompdf = new Dompdf();

    // Cargar el HTML en Dompdf
    $dompdf->loadHtml($html);

    // Configurar opciones de Dompdf (como tamaño de página, orientación, etc.)
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar el HTML como PDF
    $dompdf->render();

    // Generar el PDF y mostrarlo en el navegador
    $dompdf->stream("reporte_departamento_" . $nombre_departamento . ".pdf", array("Attachment" => false));
} else {
    // Si el formulario no ha sido enviado o el departamento no ha sido seleccionado, redirigir o mostrar un mensaje de error
}

// Cerrar la conexión a la base de datos al finalizar
cerrarConexion($conn);

?>
