<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

include("bd.php");

$usuario = $_SESSION['usuario'];

$sql = "SELECT id, usuario FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$datos_usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Usuario</title>
</head>


<body>
    <h2>Información de tu sesión</h2>
    <p><strong>ID:</strong> <?php echo $datos_usuario['id']; ?></p>
    <p><strong>Nombre de usuario:</strong> <?php echo $datos_usuario['usuario']; ?></p>

    <br>
    <h2>Quieres ver los datos</h2>
    <a href="listarinformacion.php"><input type="button" value="VER INFORMACION"></a>
    <a href="outuser.php" class="boton1">CERRAR SESIÓN</a>
</body>
</html>

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

    p {
        font-size: 18px;
        color: #555;
    }

    a {
        text-decoration: none;
        color: #3498db;
        font-size: 18px;
    }

    a:hover {
        text-decoration: underline;
    }
    
    imput[type="button"] {
        padding: 10px 20px;
        margin-top: 20px;
        text-decoration: none;
        color: #fff;
        background-color: #3498db;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
    imput[type="button"]:hover {
        background-color: #2980b9;
    }   

    input[type="button"] {
        background-color: #4CAF50;
        color: white;
        padding: 15px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 30px;
    }

    .boton1 {
    text-decoration: none;
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin: 30px;
    }
    .boton1:hover {
        background-color: #2980b9;
        text-decoration: none;

    }
    
    
</style>