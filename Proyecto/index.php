<!DOCTYPE html>
<html>
<head>
	<title>Sistema UPGarcia-calificaciones</title>

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
require_once 'conexion.php';
session_start();

if(isset($_SESSION["admin_login"])) {
	header("location: admin.php");
} elseif(isset($_SESSION["alumno_login"])) {
	header("location: alumno.html");
} elseif(isset($_SESSION["supera_portada"])) {
	header("location: superadmin.php");
}

if(isset($_POST['btn_login'])) {
	$usuario = $_POST["txt_usuario"];
	$password = $_POST["txt_password"];
	$rol = $_POST["txt_rol"];

	if(empty($usuario) || empty($password) || empty($rol)) {
		$errorMsg[] = "Ingresa usuario, contraseña y selecciona el rol.";
	} else {
		try {
			$select_stm = $db->prepare("SELECT usuario, password, rol FROM usuarios_login WHERE usuario=:usuario AND password=:password AND rol=:rol");
			$select_stm->bindParam(":usuario", $usuario);
			$select_stm->bindParam(":password", $password);
			$select_stm->bindParam(":rol", $rol);
			$select_stm->execute();

			if($select_stm->rowCount() > 0) {
				$row = $select_stm->fetch(PDO::FETCH_ASSOC);
				$dbusuario = $row["usuario"];
				$dbpassword = $row["password"];
				$dbrol = $row["rol"];

				if($usuario == $dbusuario && $password == $dbpassword && $rol == $dbrol) {
					switch ($dbrol) {
						case 'alumno':
							$_SESSION['alumno_login'] = $usuario;
							$loginMsg = "Alumno: Sesión con éxito";
							header("location: alumno.html");
							break;
						case 'admin':
							$_SESSION['admin_login'] = $usuario;
							$loginMsg = "Administrador: Sesión con éxito";
							header("location: admin.php");
							break;
						case 'maestro':
							$_SESSION['supera_portada'] = $usuario;
							$loginMsg = "Super Administrador: Sesión con éxito";
							header("location: superadmin.php");
							break;
						default:
							$errorMsg[] = "Usuario, contraseña o rol no válidos.";
					}
				} else {
					$errorMsg[] = "Usuario, contraseña o rol no válidos.";
				}
			} else {
				$errorMsg[] = "Usuario, contraseña o rol no válidos.";
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>

<div class="login-container">
	<?php
	if(isset($errorMsg)) {
		foreach($errorMsg as $error) {
			echo '<div class="alert alert-danger"><strong>' . $error . '</strong></div>';
		}
	}
	if(isset($loginMsg)) {
		echo '<div class="alert alert-success"><strong>ÉXITO! ' . $loginMsg . '</strong></div>';
	}
	?>
	<div id="formulario">
		<center><h2>Iniciar sesión</h2></center>
		<form method="post">
			<div>
				<label>Usuario</label>
				<input type="text" name="txt_usuario" class="form-control" placeholder="Ingrese usuario"/>
			</div>

			<div>
				<label>Password</label>
				<input type="password" name="txt_password" class="form-control" placeholder="Ingrese password"/>
			</div>

			<div>
				<label>Seleccionar rol</label>
				<div class="col-sm-12">
					<select class="form-control" name="txt_rol">
						<option value="" selected="selected">- Seleccionar rol -</option>
						<option value="admin">Admin</option>
						<option value="alumno">Alumno</option>
						<option value="maestro">Maestro</option>
					</select>
				</div>
			</div>

			<div>
				<div>
					<input type="submit" name="btn_login" class="btn btn-success btn-block" value="Iniciar sesión">
				</div>
			</div>

			<div>
				<div>
					¿No tienes una cuenta? <a href="registro.php"><p class="text-info">Registrar cuenta</p></a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>