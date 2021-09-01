<?php
require_once "../config/database.php";

if (isset($_POST['save'])) { // if save button on the form is clicked
            

    $nombre_archivo = $_FILES['file']['name'];  
    if (move_uploaded_file($_FILES['file']['tmp_name'], $nombre_archivo)) 
    $new_nombre=$_POST["file_name"];;  
    $archivo="$nombre_archivo"; 
    $archivo_renombrado="$new_nombre.pdf";  
    rename($archivo, $archivo_renombrado);  

    $carpeta = "uploads";    // Carpeta en la que guardaremos nuestros archivos 

    if (copy("$archivo_renombrado", "$carpeta/$archivo_renombrado"))  
    { 
        $titulo= $_POST['titulo'];
        $query = mysqli_query($mysqli, "INSERT INTO actas_cargadas(titulo,nombre_archivo) 
                                        VALUES('$titulo','$archivo_renombrado')")
or die('error ' . mysqli_error($mysqli));
if ($query) {
header("location: ../../main.php?module=equipos&alert=6");
}
    } else { 
    echo "El fichero NO se ha podido copiar"; 
    } 

    $eliminafile = "$archivo_renombrado"; 
    unlink($eliminafile); 

}
?>