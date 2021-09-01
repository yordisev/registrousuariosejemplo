
            <?php
include('includes/navbar.php');
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
?>
<?php
require_once "config/database.php";
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Usuarios <a class="btn btn-primary btn-social pull-right" href="adduser.php?form=add" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i> Agregar </a></h3>
            
        </div>
    </div>
    
            <div class="panel-body">
             	<?php

			if (empty($_GET['alert'])) {
				echo "";
			} elseif ($_GET['alert'] == 1) {
				echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Usuario Agregado correctamente.
	  </div>";
			} elseif ($_GET['alert'] == 2) {
				echo "<div class='alert alert-warning alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Usuario modificado correcamente.
	  </div>";
			} elseif ($_GET['alert'] == 3) {
				echo "<div class='alert alert-danger alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	 Error no se pudo agregar el equipo
	  </div>";
			} elseif ($_GET['alert'] == 4) {
				echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Este Numero de serial ya esta agregado
	  </div>";
			} elseif ($_GET['alert'] == 5) {
				echo "<div class='alert alert-danger alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		  <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
		 Equipo eliminado Correctamente
		</div>";
			} elseif ($_GET['alert'] == 6) {
				echo "<div class='alert alert-success alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		  <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
		 Comentario Agregado Correctamente
		</div>";
			}
			?>
			<div class="box box-primary">
				<div class="box-body">
					<div class="table-responsive">
						<?php
						$html['USER'] = '<span class="label label-primary">USER</span>';
						$html['ADMIN'] = '<span class="label label-success">ADMIN</span>';
						$html1['activo'] = '<span class="label label-danger">activo</span>';
						$html1['inactivo'] = '<span class="label label-danger">inactivo</span>';
						$salida = "";
						$query = "SELECT * FROM db_usuarios";
						if (isset($_POST['consulta'])) {
							$q = $mysqli->real_escape_string($_POST['consulta']);
							$query = "SELECT * FROM db_usuarios WHERE numero LIKE '%$q%' OR nombre LIKE '%$q%' OR apellido LIKE '%$q%' OR username LIKE '%$q%' OR permisos LIKE '$q'";
						}
						$resultado = $mysqli->query($query);
						?>
						<?php
						if ($resultado->num_rows > 0) {
							$salida .= "<table id='mitabla' width='100%' class='table table-striped table-bordered table-hover'>
    <thead>
    <tr style='color:white; background-color:#6082b4'>
        <th>No</th>
        <th>NUMERO</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>USUARIO</th>
		<th>PERMISOS</th>
		<th>ESTADO</th>
        <th>ACCIONES</th>
    </tr>
</thead>

    <tbody>";
							$no = 1;
							while ($data = $resultado->fetch_assoc()) {
								$salida .= '<tr>
        					<td>' . $no . '</td>
							<td>' . $data['numero'] . '</td>
							<td>' . $data['nombre'] . '</td>
							<td>' . $data['apellido'] . '</td>
              				<td>' . $data['username'] . '</td>
							<td>' . $html[$data['permisos']] . '</td>
							<td>' . $html1[$data['status']] . '</td>
                            <td>
							<a href="adduser.php?form=edit&id=' . $data['numero'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							</td>
                            
                </tr>';
								$no++;
							}
							$salida .= "</tbody></table>";
						} else {
							$salida .= "NO HAY DATOS :(";
						}
						echo $salida;

						$mysqli->close();
						?>
					</div>
				</div>
            </div>   
           
        </div>
        <script src="js/js/jquery.min.js"></script>
	<script src="js/js/jquery2.min.js"></script>
        <script>
		$(document).ready(function() {
			$('#mitabla').DataTable();
		});
	</script>
    <?php
    include('includes/scripts.php');
    ?>