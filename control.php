<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<style>

    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding-top: 100px;
        background-color: #f0f0f0;
    }

    h2 {
        color: #333;
    }

    a {
        text-decoration: none;
        color: #3498db;
        font-size: 18px;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
<body>
    <h2>Bienvenido, otra vez <?php echo $_SESSION['usuario']; ?>!</h2>
    <a href="informe.php">Deseas regresar</a>
    <a href="outuser.php">Cerrar sesión</a>
</body>
</html>
