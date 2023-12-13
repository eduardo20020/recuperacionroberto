<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel del Super Administrador</title>
    <style>
        body {
           
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        .styled-button,
        .styled-button-secondary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            color: #ffffff;
        }

        .styled-button {
            background-color:purple;
        }

        .styled-button-secondary {
            background-color:1285f9;
            margin-left: 10px;
        }

        .styled-button:hover,
        .styled-button-secondary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php

        session_start();

            $maestro=$_SESSION["supera_portada"];
  ?>

        
        <h2>Bienvenido Maestro: <?php echo $maestro;?></h2>
        
        <p>Esta es la página del Super Administrador. Aquí tienes control total sobre el sistema y puedes realizar tareas avanzadas de administración.</p>
        <div class="button-container">
            <a href="cerrarsesion.php" class="styled-button styled-button-secondary">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
