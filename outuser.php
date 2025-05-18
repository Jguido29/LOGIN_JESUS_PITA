<?php
session_start();

if (isset($_POST['confirmar'])) {
    session_unset();
    session_destroy();
    header("Location: index.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar cierre de sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            display: inline-block;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: inline-block;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-confirmar {
            background-color: #e74c3c;
            color: #fff;
        }

        .btn-cancelar {
            background-color: #3498db;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
        }




    </style>
</head>
<body>
    <div class="container">
        <h2>¿Estás seguro de que deseas cerrar sesión?</h2>
        <form method="post">
            <button type="submit" name="confirmar" class="btn btn-confirmar">ACEPTAR</button>
            <a href="control.php" class="btn btn-cancelar">CANCELAR</a>
        </form>
    </div>
</body>
</html>
