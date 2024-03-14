$(document).ready(function() {
    // Función para cargar y actualizar el contenido del currículum
    function loadResume() {
        $.ajax({
            url: 'datos.html', // Ruta al archivo HTML con los datos del currículum
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#resumeContainer').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar el currículum:', status, error);
            }
        });
    }

    // Cargar el currículum al cargar la página
    loadResume();

    // Actualizar el currículum cada cierto intervalo de tiempo (por ejemplo, cada 5 segundos)
    setInterval(loadResume, 5000); // 5000 milisegundos = 5 segundos
});
