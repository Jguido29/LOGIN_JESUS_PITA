<?php include("bd.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Inscripciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Crear Inscripciones</h2>
        <form action="crearinscripciones.php" method="POST">
            <label class="form-label" for="nombre_evento">Nombre del Evento:</label>
            <input type="text" name="nombre_evento" class="form-control" required><br><br>

            <label class ="form-label" for="fecha">Fecha:</label>
            <input type="date" name="fecha" class="form-control" required><br><br>


            <label class ="form-label" for="usuario.id">Usuario:</label>
            <select name="usuario.id" class="form-select" required>
                <option value="">Seleccione un usuario</option>
                <?php
                $usuarios = $conexion ->query("SELECT id, usuario FROM usuarios");
                while ($user = $usuarios->fetch_assoc()) {
                    echo "<option value='" . $user['id'] . "'>" . $user['usuario'] . "</option>";
                }
                ?>
            </select>
            <br><br>

            <input type="submit" value="CREAR INSCRIPCION">
            <a href="informe.php"><input type="button" value="VOLVER"></a>
        </form>
        </div>       
    </body>
</html>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $evento = $_POST['nombre_evento'];
            $fecha = $_POST['fecha'];
            $usuario_id = $_POST['usuario_id'];

            $stmt = $conexion->prepare(query: "INSERT INTO inscripciones (nombre_evento, fecha, usuario_id) VALUES (?, ?, ?)");
            $stmt->bind_param(  "ssi", $evento, $fecha, $usuario_id);
            if ($stmt->execute()) {
                echo "<div style='text-align: center; margin-top: 20px; color: green; font-weight: bold;'>
            Inscripción creada exitosamente.
          </div>";
            } else {
                echo "<div style='text-align: center; margin-top: 20px; color: red; font-weight: bold;'>
            Error al crear la inscripción: " . $stmt->error . "
          </div>";
            }
            $stmt->close();
        }        
        ?>         
    


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
        color: #3498db;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 30px;
    }

   
    input[type="button"] {
        background-color: #3498db;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

  
    

</style>

