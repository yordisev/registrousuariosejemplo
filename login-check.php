
<?php

require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php");
}
else {

	$query = mysqli_query($mysqli, "SELECT * FROM db_usuarios WHERE username='$username' AND password='$password' AND status='activo'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id']   = $data['id'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nombre'] = $data['nombre'];
		$_SESSION['permisos'] = $data['permisos'];
	
		header("Location: inicio.php");
	}


	else {
		header("Location: index.php");
	}
}
?>