<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuarios</title>
    <style>
        body {
            background-color: #800080; /* Fondo morado */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff; /* Fondo blanco */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            color: #800080; /* Morado oscuro */
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #800080; /* Morado oscuro */
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .btn-login {
            background-color: #800080; /* Morado oscuro */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #4b004b; /* Morado más oscuro - Hover */
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
            color: #800080; /* Morado oscuro */
        }
    </style>
       
</head>
<body>
<?php
require_once "conexion.php";
if (isset($_POST['btn_register'])) {
    $usuario = $_POST['txt_usuario'];
    $password = $_POST['txt_password'];
    $rol = $_POST['txt_rol'];
    $errorMsg = array();

    if (empty($usuario)) {
        $errorMsg[] = "Ingrese nombre de usuario";
    } elseif (empty($password)) {
        $errorMsg[] = "Ingrese contraseña";
    } elseif (strlen($password) < 6) {
        $errorMsg[] = "La contraseña debe tener al menos 6 caracteres";
    } elseif (empty($rol)) {
        $errorMsg[] = "Seleccione un rol";
    } else {
        try {
            $select_stmt = $db->prepare("SELECT usuario FROM usuarios_login WHERE usuario = :usuario");
            $select_stmt->bindParam(":usuario", $usuario);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && $row["usuario"] == $usuario) {
                $errorMsg[] = "El usuario ya existe";
            } else {
                $insert_stmt = $db->prepare("INSERT INTO usuarios_login (usuario, password, rol) VALUES (:usuario, :password, :rol)");
                $insert_stmt->bindParam(":usuario", $usuario);
                $insert_stmt->bindParam(":password", $password);
                $insert_stmt->bindParam(":rol", $rol);

                if ($insert_stmt->execute()) {
                    $registerMsg = "Registro exitoso. Redirigiendo a la página de inicio de sesión...";
                    header("refresh:2;url=index.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>

<div>
    <?php
    if (isset($errorMsg)) {
        foreach ($errorMsg as $error) {
            echo '<div><strong>ERROR: ' . $error . '</strong></div>';
        }
    }
    if (isset($registerMsg)) {
        echo '<div><strong>ÉXITO: ' . $registerMsg . '</strong></div>';
    }
    ?>
    <div  class="login-container">
        <center><h2>Registrar</h2></center>
        <form method="post">
            <div>
                <label>Usuario</label>
                <input type="text" name="txt_usuario" placeholder="Ingrese usuario" />
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" name="txt_password" placeholder="Ingrese contraseña" />
            </div>
            <div>
                <label>Seleccione rol</label>
                <div>
                    <select name="txt_rol">
                        <option value="" selected="selected">- Seleccione rol -</option>
                        <option value="admin">Admin</option>
                        <option value="alumno">Alumno</option>
                        <option value="maestro">Maestro</option>
                    </select>
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" name="btn_register" value="Registro">
                </div>
            </div>
            <div>
                <div>
                    ¿Ya tienes una cuenta? <a href="index.php"><p>Iniciar sesión</p></a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
