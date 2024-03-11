<?php 
session_start(); 
include "bdprint.php";

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    
     $usuario = $_POST['usuario'];
     $password =$_POST['clave'];
 
	if (empty($usuario)) {
		header("Location: login.php?error=El campo usuario es obligatorio");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=El campo contraseña es obligatorio");
	    exit();
	}else{
		$query = "SELECT * FROM trabajador WHERE usuario='$usuario' AND clave='$password'";

		$result = mysqli_query($conexion, $query);
		
		if (mysqli_num_rows($result) ===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $usuario && $row['clave'] === $password) {
            	$_SESSION['usuario'] = $row['usuario'];
            	$_SESSION['nombre'] = $row['nombre'];
            	$_SESSION['cod_emp'] = $row['cod_emp'];
            	header("Location: home.php");
		        exit(); 
			}
		}else{
			header("Location: login.php?error=Usuario no Registrado");
	        exit();
		}
	}	
}       
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Evaluacion I Componentes Web Open Source</title>
	<link rel="stylesheet"href="assets/style.css">
</head>
<body>
     <form action="login.php" method="POST">
     	<h1>Algah Print</h1>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Usuario</label>
     	<input type="text" name="usuario" placeholder="Ingresar Usuario"><br>

     	<label>Contraseña</label>
     	<input type="password" name="clave" placeholder="Ingresar Contraseña"><br>

     	<button type="submit">Ingresar</button>
     </form>
</body>
</html>
