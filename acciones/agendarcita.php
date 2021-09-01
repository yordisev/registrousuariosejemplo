<?php
require_once "../config/database.php";

			if (isset($_POST['insert'])) {
				$diacita = mysqli_real_escape_string($mysqli, (strip_tags($_POST["diacita"], ENT_QUOTES))); //Escanpando caracteres 
				$horacita = mysqli_real_escape_string($mysqli, (strip_tags($_POST["horacita"], ENT_QUOTES))); //Escanpando caracteres 
				$especialista = mysqli_real_escape_string($mysqli, (strip_tags($_POST["especialista"], ENT_QUOTES))); //Escanpando caracteres 
				$numero = mysqli_real_escape_string($mysqli, (strip_tags($_POST["numero"], ENT_QUOTES))); //Escanpando caracteres 
				$pnombre = mysqli_real_escape_string($mysqli, (strip_tags($_POST["pnombre"], ENT_QUOTES))); //Escanpando caracteres
				$papellido = mysqli_real_escape_string($mysqli, (strip_tags($_POST["papellido"], ENT_QUOTES))); //Escanpando caracteres 
				$usuario = mysqli_real_escape_string($mysqli, (strip_tags($_POST["usuario"], ENT_QUOTES))); //Escanpando caracteres 
				$estadocita = mysqli_real_escape_string($mysqli, (strip_tags($_POST["estadocita"], ENT_QUOTES))); //Escanpando caracteres 
				$fechacomentario = mysqli_real_escape_string($mysqli, (strip_tags($_POST["fechacomentario"], ENT_QUOTES))); //Escanpando caracteres 

					$insert = mysqli_query($mysqli, "INSERT INTO db_historial(diacita,horacita,especialista,numero,pnombre,papellido,usuario,estadocita,fechacomentario)
															VALUES('$diacita','$horacita','$especialista','$numero','$pnombre','$papellido','$usuario','$estadocita',NOW())") or die(mysqli_connect_error());
					if ($insert) {
						header("location: ../inicio.php?alert=1");
					} else {
						header("location: ../vistaequipo.php?alert=6");
					}
				
			}
			?>