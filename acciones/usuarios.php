

<?php



require_once "../config/database.php";




	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
            $documento  = mysqli_real_escape_string($mysqli, trim($_POST['documento']));
            $numero  = mysqli_real_escape_string($mysqli, trim($_POST['numero']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $apellido  = mysqli_real_escape_string($mysqli, trim($_POST['apellido']));
            $fechan  = mysqli_real_escape_string($mysqli, trim($_POST['fechan']));
            $sexo  = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
			$permisos = mysqli_real_escape_string($mysqli, trim($_POST['permisos']));
			$status = mysqli_real_escape_string($mysqli, trim($_POST['status']));

            $query = mysqli_query($mysqli, "INSERT INTO db_usuarios(documento,numero,nombre,apellido,fechan,sexo,username,password,permisos,status)
                                            VALUES('$documento','$numero','$nombre','$apellido','$fechan','$sexo','$username','$password','$permisos','$status')")
                                            or die('error: '.mysqli_error($mysqli));    

          
            if ($query) {
                header("location: ../usuarios.php?alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			
				$documento  = mysqli_real_escape_string($mysqli, trim($_POST['documento']));
				$numero  = mysqli_real_escape_string($mysqli, trim($_POST['numero']));
				$nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
				$apellido  = mysqli_real_escape_string($mysqli, trim($_POST['apellido']));
				$fechan  = mysqli_real_escape_string($mysqli, trim($_POST['fechan']));
				$sexo  = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
				$username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
				$permisos = mysqli_real_escape_string($mysqli, trim($_POST['permisos']));
				$status = mysqli_real_escape_string($mysqli, trim($_POST['status']));

					
                    $query = mysqli_query($mysqli, "UPDATE db_usuarios SET documento 	= '$documento',
                    													nombre 	= '$nombre',
                    													apellido       = '$apellido',
                    													fechan     = '$fechan',
                    													sexo   = '$sexo',
                    													username       = '$username',
																		password       = '$password',
                    													permisos     = '$permisos',
                    													status   = '$status'
                                                                  WHERE numero 	= '$numero'")
                                                    or die('error: '.mysqli_error($mysqli));

                
                    if ($query) {
                  
                        header("location: ../usuarios.php?alert=2");
                    }
				
			
		}
	}


	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "activo";

		
            $query = mysqli_query($mysqli, "UPDATE usuarios SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('error: '.mysqli_error($mysqli));

  
            if ($query) {
               
                header("location: ../../main.php?module=user&alert=3");
            }
		}
	}


	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "bloqueado";

		
            $query = mysqli_query($mysqli, "UPDATE usuarios SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Error : '.mysqli_error($mysqli));

        
            if ($query) {
              
                header("location: ../../main.php?module=user&alert=4");
            }
		}
	}		
		
?>