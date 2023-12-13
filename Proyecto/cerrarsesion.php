<?php
session_start();

session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cerrar sesion</title>
	<style>
        body {
		
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color:white;
        }

        .container {
            text-align: center;
            background-color: #90c2f4;
            padding: 90px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            margin-top: 20px;
        }

        .styled-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            color: #ffffff;
            background-color: #3451c6;
        }
    </style>
</head>
<body>
	<div class="container">
		<h2>Has cerrado sesion Correctamente</h2>
		<div class="button-container">
			<a href="index.php" class="styled-button">Ir a la pagina inicial</a>
		</div>
	</div>

</body>
</html>