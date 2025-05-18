<?php  
$usuario = $_POST['nombre'];
$clave = $_POST['clave']; 
session_start();

$_SESSION['usuario'] = $usuario;

include("bd.php");
$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
if ($filas) {
    header("location:informe.php");
} else {
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR DE AUTENTICACION</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>