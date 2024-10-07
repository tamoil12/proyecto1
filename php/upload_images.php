<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evidencias";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario_id = 1; // Suponiendo que el usuario esté logueado y tengamos su ID

$uploads_dir = '../uploads/';
$date_time = date('Y-m-d H:i:s');

// Manejo de las 4 imágenes
for ($i = 1; $i <= 4; $i++) {
    $file_tmp = $_FILES["image$i"]['tmp_name'];
    $file_name = basename($_FILES["image$i"]['name']);
    $file_path = $uploads_dir . $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO evidencias (usuario_id, imagen, fecha_hora) VALUES ('$usuario_id', '$file_name', '$date_time')";
        $conn->query($sql);
    }
}

$conn->close();
header("Location: ../user.php");
?>
