<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['tipo'] != 'user') {
    header("Location: index.html"); // Redirige al inicio de sesión si no hay sesión activa o si no es usuario
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Evidencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2>Subir Evidencias</h2>
            <a href="php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
        <form id="uploadForm" action="php/upload_images.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <label class="upload-label" for="image1">Subir imagen 1</label>
                    <input type="file" id="image1" name="image1" required>
                </div>
                <div class="col-md-3">
                    <label class="upload-label" for="image2">Subir imagen 2</label>
                    <input type="file" id="image2" name="image2" required>
                </div>
                <div class="col-md-3">
                    <label class="upload-label" for="image3">Subir imagen 3</label>
                    <input type="file" id="image3" name="image3" required>
                </div>
                <div class="col-md-3">
                    <label class="upload-label" for="image4">Subir imagen 4</label>
                    <input type="file" id="image4" name="image4" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
