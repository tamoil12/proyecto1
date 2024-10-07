<?php
$servername = "localhost";
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$dbname = "evidencias";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$role = $_POST['role']; // Obtener el rol del formulario

// Encriptar contraseña
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insertar usuario en la base de datos
$sql = "INSERT INTO usuarios (username, email, password, tipo) VALUES ('$user', '$email', '$hashed_password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
    header("Location: ../index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
