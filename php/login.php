<?php
session_start();
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
$email = $_POST['email'];
$pass = $_POST['password'];

// Consultar usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Verificar contraseña
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        // Establecer variables de sesión
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['tipo'] = $row['tipo'];

        // Redirigir según el tipo de usuario
        if ($row['tipo'] == 'admin') {
            header("Location: ../admin.html");
        } else {
            header("Location: ../user.html");
        }
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No se encontró un usuario con ese correo.";
}
if ($row['tipo'] == 'admin') {
    header("Location: ../admin.php");
} else {
    header("Location: ../user.php");
}


$conn->close();
?>
