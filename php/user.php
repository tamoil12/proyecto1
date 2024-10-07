<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html"); // Redirige al inicio de sesión si no hay sesión activa
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<!-- El resto del código HTML permanece igual -->
