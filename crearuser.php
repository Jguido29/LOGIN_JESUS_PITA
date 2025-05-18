<?php include("bd.php"); ?>
<!DOCTYPE html>
<html lang="es">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body> 
    <div class="container">
        <h2>Crear Usuario</h2>
        <form action="crearuser.php" method="POST">
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="nombre" required><br><br>

            <label for="correo">Contraseña:</label>
            <input type="password" name="contrasena" required><br><br>

            <label for="contrasena">email:</label>
            <input type="email" name="correo" required><br><br>

            <input type="submit" value="CREAR USUARIO">
            <a href="index.html"><input type="button" value="VOLVER AL MENU"></a>
        </form>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            // Verificar si el usuario ya existe
            $query = "SELECT * FROM usuarios WHERE usuario='$nombre'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<p style='color: red;'>El usuario ya existe.</p>";
            } else {
                // Insertar el nuevo usuario
                $query = "INSERT INTO usuarios (usuario, clave, email) VALUES ('$nombre', '$contrasena', '$correo')";
                if (mysqli_query($conexion, $query)) {
                    echo "<p style='color: green;'>Usuario creado exitosamente.</p>";
                } else {
                    echo "<p style='color: red;'>Error al crear el usuario: " . mysqli_error($conexion) . "</p>";
                }
            }
        }
        ?> 
        
    </div>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }

    .container {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        margin: 50px;
    }
   
    input[type="button"] {
        background-color:rgb(60, 106, 231);
        color: white;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        align-items: center;
    }
      

</style>
</html>
