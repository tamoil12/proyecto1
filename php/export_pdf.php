<?php
require('fpdf186/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Evidencias', 0, 1, 'C');
    }

    function addImage($user, $image)
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, "Usuario: $user", 0, 1);
        $this->Image('../uploads/' . $image, 10, null, 50, 50);
        $this->Ln(60);
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evidencias";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT usuarios.username, evidencias.imagen FROM evidencias JOIN usuarios ON evidencias.usuario_id = usuarios.id";
$result = $conn->query($sql);

$pdf = new PDF();
$pdf->AddPage();

while ($row = $result->fetch_assoc()) {
    $pdf->addImage($row['username'], $row['imagen']);
}

$pdf->Output('D', 'reporte.pdf');
$conn->close();
?>
