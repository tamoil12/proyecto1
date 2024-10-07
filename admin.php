<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.html"); // Redirige al inicio de sesión si no hay sesión activa o si no es admin
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ver Evidencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Ver Evidencias de Usuarios</h2>
            <a href="php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
        <div id="evidencias" class="row mt-4"></div>
        <button id="exportPdf" class="btn btn-primary mt-3">Exportar en PDF</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        fetch('php/fetch_images.php')
            .then(response => response.json())
            .then(data => {
                const evidenciasDiv = document.getElementById('evidencias');
                data.forEach(evidencia => {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-4';
                    col.innerHTML = `
                        <div class="card">
                            <img src="uploads/${evidencia.imagen}" class="card-img-top" alt="Evidencia">
                            <div class="card-body">
                                <p class="card-text">Usuario: ${evidencia.usuario_id}</p>
                                <p class="card-text">Fecha: ${evidencia.fecha_hora}</p>
                            </div>
                        </div>
                    `;
                    evidenciasDiv.appendChild(col);
                });
            });

        document.getElementById('exportPdf').addEventListener('click', function() {
            window.location.href = 'php/export_pdf.php';
        });
    </script>
</body>
</html>
