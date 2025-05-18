<?php include("bd.php"); ?>

<!DOCTYPE html>
<html lang="es">   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Inscripciones</title>
    </head>
    <body>
        <div class="container mt 5">
        <h2 class = "text_sucess mb 4"> Listado de Inscripciones</h2>
        </div>
    <?php
        $query = "SELECT * FROM inscripciones";
        $result = mysqli_query($conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered'>";
            echo "<tr><th>ID</th><th>EVENTOS</th></th><th>FECHA</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre_evento'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay inscripciones registradas.</p>";
        }
        ?>

        <a href="informe.php"><input type="button" style=" background-color: #3498db; color: white; padding: 10px 15px;border: none;border-radius: 5px; cursor: pointer; margin-top: 20px; text-align: right 50px;" value="VOLVER"></a>
        <a href="crearinscripciones.php"><input type="button" style=" background-color: #4CAF50; color: white; padding: 10px 15px;border: none;border-radius: 5px; cursor: pointer; margin-top: 20px; text-align: right 50px;" value="CREAR EVENTO"></a>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                padding: 20px;
            }

            .container {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                color: #333;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #3498db;
                color: white;
            }

            tr:hover {
                background-color: #f1f1f1;
            }




            
           
        </style>













    </body>