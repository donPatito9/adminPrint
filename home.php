<?php 
session_start();

if (isset($_SESSION['cod_emp']) && isset($_SESSION['usuario'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>Evaluación I Componentes Web Open Source</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
     <div class="container">
          <h1 >Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
     <a class="volver" href="volver.php">Volver</a></div>
     
     
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
