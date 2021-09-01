<?php
include('includes/navbar.php');
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
?>
<?php
require_once "config/database.php";
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Afiliados<a class="btn btn-primary btn-social pull-right" href="addafiliado.php?form=add" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i> Agregar </a></h3>

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
	   Afiliado Agregado correctamente.
	  </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-warning alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
        Afiliado modificado correcamente.
	  </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-danger alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	 Afiliado eliminado Correctamente
	  </div>";
        } elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Documento cargado correctamente
	  </div>";
        } 
        ?>
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <?php

                    $html['ACTIVO'] = '<span class="label label-primary">ACTIVO</span>';
                    $html['INACTIVO'] = '<span class="label label-success">INACTIVO</span>';

                    $salida = "";
                    $query = "SELECT * from db_afiliados where numero order by pnombre asc ";
                    if (isset($_POST['consulta'])) {
                        $q = $mysqli->real_escape_string($_POST['consulta']);
                        $query = "SELECT * FROM db_afiliados WHERE numero LIKE '%$q%' OR pnombre LIKE '%$q%' OR snombre LIKE '%$q%' OR papellido LIKE '%$q%' OR sapellido LIKE '$q' ";
                    }
                    $resultado = $mysqli->query($query);
                    ?>
                    <?php
                    if ($resultado->num_rows > 0) {
                        $salida .= "<table class='table table-bordered' id='mitabla' width='100%' cellspacing='0'>
  <thead>
  <tr style='color:white; background-color:#6082b4'>
      <th>No</th>
      <th>TIPO</th>
      <th>NUMERO</th>
      <th>NOMBRE</th>
      <th>APELLIDO 1</th>
      <th>APELLIDO 2</th>
      <th>ESTADO</th>
      <th>ACCIONES</th>
  </tr>
</thead>

  <tbody>";
                        $no = 1;
                        while ($fila = $resultado->fetch_assoc()) {
                            $salida .= '<tr>
                          <td>' . $no . '</td>
                          <td>' . $fila['documento'] . '</td>
                          <td>' . $fila['numero'] . '</td>
                          <td><a href="addafiliado.php?form=vista&id=' . $fila['numero'] . '"><span class="fa fa-user" aria-hidden="true"></span> ' . $fila['pnombre'] . '</a></td>
                          <td>' . $fila['papellido'] . '</td>
                          <td>' . $fila['sapellido'] . '</td>
                          <td>' . $html[$fila['estado']] . '</td>
                          <td>
                          <a href="" title="Subir Acta" data-toggle="modal" data-target="#subiracta" onclick="document.querySelector(\'#serial_equipo_carga\').value=\'' . $fila['numero'] .'\'" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></a>
                          
                              <a href="addafiliado.php?form=edit&id=' . $fila['numero'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                              <a href="acciones/eliminar.php?aksi=delete&nik=' . $fila['numero'] . '" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ' . $fila['numero'] . '?\')" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a>
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
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ MODAL SUBIR ARCHIVOS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <form method="post" action="acciones/afiliados.php?act=subir" enctype="multipart/form-data">
      <!-- Modal -->
      <div id="subiracta" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="color:white; background-color: #3c8dbc;">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h4 class="modal-title">Subir Acta</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">

                <div class="col-sm-4">
                  <label class="col-sm-4 control-label"><b>SERIAL</b></label>
                  <input type="text" name="file_name" class="form-control" id="serial_equipo_carga" readonly>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-4 control-label"><b>Titulo</b></label>
                  <input type="text" name="titulo" class="form-control">
                </div>
                
              </div>
              
              <br><br>
              <center>
                <input type="file" name="file" style="margin-top: 12px;">
                <button class="btn btn-primary" type="submit" name="save" style="margin-top: 12px;">Subir</button>
              </center>

            </div>
          </div>

        </div>
      </div>
    </form>
        <!------------------ Fin Modal -------------------------------------->


    <script src="js/js/jquery.min.js"></script>
    <script src="js/js/jquery2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mitabla').DataTable();
        });
    </script>
<script>
    document.getElementById("numero").onchange = function(){alerta()};
    function alerta() {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();
        request.responseType = 'json';

        // Objeto PHP que consultaremos
        request.open("POST", "services.php");

        // Definiendo el listener
        request.onreadystatechange = function() {
            // Revision si fue completada la peticion y si fue exitosa
            if(this.readyState === 4 && this.status === 200) {
                // Ingresando la respuesta obtenida del PHP
                document.getElementById("pnombre").value = this.response.pnombre;
                document.getElementById("papellido").value = this.response.papellido;
            }
        };

        // Recogiendo la data del HTML
        var myForm = document.getElementById("myForm");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }
</script>

    <?php
    include('includes/scripts.php');
    ?>