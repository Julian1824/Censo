<?php 
$username = $_POST["username"];
$password = $_POST["password"];

include("conexioni.php");

$proceso=$conn->query("SELECT * FROM tbl_lideres WHERE id_censistas = '$username' AND id_censistas ='$password' ");

if($resultado = mysqli_fetch_array($proceso)){
	header("Location: ../index.php");
}else{
	 echo "Nombre de usuario o contraseña incorrecto";
}