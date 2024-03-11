<?php

$server= "localhost";
$user= "root";
$password = "";
$db_name = "bdprint";

$conexion = mysqli_connect($server, $user, $password, $db_name);

if (!$conexion) 
	exit ("Error de coneccion:". mysqli_connect_error());
/**else 
echo "Coneccion establecida";
**/
?>

