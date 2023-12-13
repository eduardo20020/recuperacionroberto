<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel del Administrador</title>
    <link rel="stylesheet" type="text/css" href="css/EstiloPanel.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido Administrador</h2>
        <p>Esta es la página del Administrador. Aquí puedes realizar tareas de administración, como gestionar usuarios y calificaciones.</p>
        <div class="button-container">
            <a href="cerrarsesion.php" class="styled-button styled-button-secondary">Cerrar sesión</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="4%">Id_Usuario</th>
                            <th width="18%">Usuario</th>
                            <th width="19%">Rol</th>
                            <th width="24%">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'conexion.php';
                    $select_stmt=$db->prepare("SELECT id_usuario,usuario,rol,password FROM usuarios_login");
                    $select_stmt->execute();
                    
                    while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    ?>
                        <tr>
                            <td><?php echo $row["id_usuario"]; ?></td>
                            <td><?php echo $row["usuario"]; ?></td>
                            <td><?php echo $row["rol"]; ?></td>
                            <td>*******</td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>



</body>
</html>
