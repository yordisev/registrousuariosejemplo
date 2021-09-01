
<?php  

require_once "config/database.php";


$query = mysqli_query($mysqli, "SELECT id, nombre, permisos FROM db_usuarios WHERE id='$_SESSION[id]'")
                                or die('error: '.mysqli_error($mysqli));


$data = mysqli_fetch_assoc($query);
?>
