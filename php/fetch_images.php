<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evidencias";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM evidencias";
$result = $conn->query($sql);

$evidencias = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $evidencias[] = $row;
    }
}

$conn->close();
echo json_encode($evidencias);
?>
