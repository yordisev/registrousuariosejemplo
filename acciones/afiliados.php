
<?php



require_once "../config/database.php";

    if ($_GET['act'] == 'insert') {
        if (isset($_POST['Guardar'])) {
            $documento = mysqli_real_escape_string($mysqli, (strip_tags($_POST["documento"], ENT_QUOTES))); //Escanpando caracteres 
            $numero = mysqli_real_escape_string($mysqli, (strip_tags($_POST["numero"], ENT_QUOTES))); //Escanpando caracteres 
            $pnombre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["pnombre"], ENT_QUOTES))); //Escanpando caracteres 
            $snombre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["snombre"], ENT_QUOTES))); //Escanpando caracteres 
            $papellido = mysqli_real_escape_string($mysqli, (strip_tags($_POST["papellido"], ENT_QUOTES))); //Escanpando caracteres 
            $sapellido = mysqli_real_escape_string($mysqli, (strip_tags($_POST["sapellido"], ENT_QUOTES))); //Escanpando caracteres 
            $fechan = mysqli_real_escape_string($mysqli, (strip_tags($_POST["fechan"], ENT_QUOTES))); //Escanpando caracteres 
            $sexo = mysqli_real_escape_string($mysqli, (strip_tags($_POST["sexo"], ENT_QUOTES))); //Escanpando caracteres 
            $tsangre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["tsangre"], ENT_QUOTES))); //Escanpando caracteres 
            $estadoc = mysqli_real_escape_string($mysqli, (strip_tags($_POST["estadoc"], ENT_QUOTES))); //Escanpando caracteres 
            $telefono = mysqli_real_escape_string($mysqli, (strip_tags($_POST["telefono"], ENT_QUOTES))); //Escanpando caracteres 
            $correo = mysqli_real_escape_string($mysqli, (strip_tags($_POST["correo"], ENT_QUOTES))); //Escanpando caracteres 
            $ciudad = mysqli_real_escape_string($mysqli, (strip_tags($_POST["ciudad"], ENT_QUOTES))); //Escanpando caracteres 
            $barrio = mysqli_real_escape_string($mysqli, (strip_tags($_POST["barrio"], ENT_QUOTES))); //Escanpando caracteres 
            $direccion = mysqli_real_escape_string($mysqli, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
            $estado = mysqli_real_escape_string($mysqli, (strip_tags($_POST["estado"], ENT_QUOTES))); //Escanpando caracteres 


            
                $insert = mysqli_query($mysqli, "INSERT INTO db_afiliados(documento,numero,pnombre,snombre,papellido,sapellido,fechan,sexo,tsangre,estadoc,telefono,correo,ciudad,barrio,direccion,estado)
                                                        VALUES('$documento','$numero','$pnombre','$snombre','$papellido','$sapellido','$fechan','$sexo','$tsangre','$estadoc','$telefono','$correo','$ciudad','$barrio','$direccion','$estado')") or die(mysqli_error());
                if ($insert) {
                    header("location: ../afiliados.php?alert=1");
                } else {
                    header("location: ../afiliados.php?alert=3");
                }
             
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['Guardar'])) {

            $documento = mysqli_real_escape_string($mysqli, (strip_tags($_POST["documento"], ENT_QUOTES))); //Escanpando caracteres 
				$numero = mysqli_real_escape_string($mysqli, (strip_tags($_POST["numero"], ENT_QUOTES))); //Escanpando caracteres 
				$pnombre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["pnombre"], ENT_QUOTES))); //Escanpando caracteres 
				$snombre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["snombre"], ENT_QUOTES))); //Escanpando caracteres 
				$papellido = mysqli_real_escape_string($mysqli, (strip_tags($_POST["papellido"], ENT_QUOTES))); //Escanpando caracteres 
				$sapellido = mysqli_real_escape_string($mysqli, (strip_tags($_POST["sapellido"], ENT_QUOTES))); //Escanpando caracteres 
				$fechan = mysqli_real_escape_string($mysqli, (strip_tags($_POST["fechan"], ENT_QUOTES))); //Escanpando caracteres 
				$sexo = mysqli_real_escape_string($mysqli, (strip_tags($_POST["sexo"], ENT_QUOTES))); //Escanpando caracteres 
                $tsangre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["tsangre"], ENT_QUOTES))); //Escanpando caracteres 
				$estadoc = mysqli_real_escape_string($mysqli, (strip_tags($_POST["estadoc"], ENT_QUOTES))); //Escanpando caracteres 
				$telefono = mysqli_real_escape_string($mysqli, (strip_tags($_POST["telefono"], ENT_QUOTES))); //Escanpando caracteres 
				$correo = mysqli_real_escape_string($mysqli, (strip_tags($_POST["correo"], ENT_QUOTES))); //Escanpando caracteres 
				$ciudad = mysqli_real_escape_string($mysqli, (strip_tags($_POST["ciudad"], ENT_QUOTES))); //Escanpando caracteres 
				$barrio = mysqli_real_escape_string($mysqli, (strip_tags($_POST["barrio"], ENT_QUOTES))); //Escanpando caracteres 
                $direccion = mysqli_real_escape_string($mysqli, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
                $estado = mysqli_real_escape_string($mysqli, (strip_tags($_POST["estado"], ENT_QUOTES))); //Escanpando caracteres 
				
				
				$update = mysqli_query($mysqli, "UPDATE db_afiliados SET documento = '$documento',
				pnombre      = '$pnombre',
				snombre    = '$snombre',
				papellido    = '$papellido',
				sapellido       = '$sapellido',
				fechan      = '$fechan',
				sexo      = '$sexo',
				tsangre    = '$tsangre',
				estadoc    = '$estadoc',
				telefono       = '$telefono',
				correo      = '$correo',
				ciudad      = '$ciudad',
				barrio    = '$barrio',
				direccion    = '$direccion',
                estado    = '$estado'
		  WHERE numero    = '$numero'") or die(mysqli_error());
				if($update){
					header("location: ../afiliados.php?alert=2");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
            $estado = 'X';
            $query = mysqli_query($mysqli, "UPDATE db_equipos SET estado='$estado' WHERE serial='$codigo'")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../afiliados.php?alert=3");
            }
        }
    } elseif ($_GET['act'] == 'subir') {
        if (isset($_POST['save'])) { // if save button on the form is clicked
            

            $nombre_archivo = $_FILES['file']['name'];  
            if (move_uploaded_file($_FILES['file']['tmp_name'], $nombre_archivo)) 
            $new_nombre=$_POST["file_name"];;  
            $archivo="$nombre_archivo"; 
            $archivo_renombrado="$new_nombre.pdf";  
            rename($archivo, $archivo_renombrado);  

            $carpeta = "certificados";    // Carpeta en la que guardaremos nuestros archivos 

            if (copy("$archivo_renombrado", "$carpeta/$archivo_renombrado"))  
            { 
                $titulo= $_POST['titulo'];
                $query = mysqli_query($mysqli, "INSERT INTO actas_cargadas(titulo,nombre_archivo) 
                                                VALUES('$titulo','$archivo_renombrado')")
or die('error ' . mysqli_error($mysqli));
if ($query) {
    header("location: ../afiliados.php?alert=4");
}
            } else { 
            echo "El fichero NO se ha podido copiar"; 
            } 

            $eliminafile = "$archivo_renombrado"; 
            unlink($eliminafile); 

        }
    }

?>