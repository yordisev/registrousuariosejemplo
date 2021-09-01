<?php
include('includes/navbar.php');
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
?>
 <?php

if (empty($_GET['alert'])) {
    echo "";
} elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissable'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
Afiliado Agregado correctamente.
</div>";
} 
?>
<div id="page-wrapper">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">

                <h3 class="page-header">Citas Medicas <a href="" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#add-stock"><i class="fa fa-plus"></i>Agendar Cita</a></h3>
            </div>
        </div>
    </div>
    
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <?php
            $query = mysqli_query($mysqli, "SELECT COUNT(*) as numero FROM db_historial  WHERE DATE_FORMAT(diacita, '%Y-%m-%d') = CURDATE()")
                or die('Error ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-md fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['numero']; ?></div>
                            <div>Citas dia de Hoy</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <?php
            $query = mysqli_query($mysqli, "SELECT COUNT(*) as atendido FROM db_historial  WHERE DATE_FORMAT(diacita, '%Y-%m-%d') = CURDATE() AND	estadocita='ATENDIDO'")
                or die('Error ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-square-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['atendido']; ?></div>
                            <div>Atendidos</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <?php
            $query = mysqli_query($mysqli, "SELECT COUNT(*) as poratender FROM db_historial  WHERE DATE_FORMAT(diacita, '%Y-%m-%d') = CURDATE() AND	estadocita='POR ATENDER'")
                or die('Error ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['poratender']; ?></div>
                            <div>Pendientes</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <?php
            $query = mysqli_query($mysqli, "SELECT COUNT(*) as ausente FROM db_historial  WHERE DATE_FORMAT(diacita, '%Y-%m-%d') = CURDATE() AND	estadocita='AUSENTE'")
                or die('Error ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $data['ausente']; ?></div>
                            <div>Ausentes en sala</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <?php
    $html['POR ATENDER'] = '<span class="label label-primary">POR ATENDER</span>';
    $html['ATENDIDO'] = '<span class="label label-success">ATENDIDO</span>';
    $html['AUSENTE'] = '<span class="label label-danger">AUSENTE</span>';

    $salida = "";
    $query = "SELECT * FROM db_historial  WHERE DATE_FORMAT(diacita, '%Y-%m-%d') = CURDATE() order by horacita asc ";
    if (isset($_POST['consulta'])) {
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM db_historial WHERE diacita LIKE '%$q%' OR horacita LIKE '%$q%' OR especialidad LIKE '%$q%' OR especialista LIKE '%$q%' OR numero LIKE '$q' OR pnombre LIKE '%$q%' OR papellido LIKE '$q' OR estadocita LIKE '$q' ";
    }
    $resultado = $mysqli->query($query);
    ?>
    <?php
    if ($resultado->num_rows > 0) {
        $salida .= "<table class='table table-bordered table-striped' id='mitabla'>
  <thead>
  <tr style='color:white; background-color:#6082b4'>
      <th>No</th>
      <th>DIA</th>
      <th>HORA</th>
      <th>ESPECIALISTA</th>
      <th>CEDULA</th>
      <th>NOMBRE APELLIDO</th>
      <th>ESTADO</th>
      <th>ACCION</th>
  </tr>
</thead>

  <tbody>";
        $no = 1;
        while ($fila = $resultado->fetch_assoc()) {
            $salida .= '<tr>
      <td>' . $no . '</td>
            <td>' . $fila['diacita'] . '</td>
            <td>' . $fila['horacita'] . '</td>
            <td>' . $fila['especialista'] . '</td>
            <td>' . $fila['numero'] . '</td>
            <td>' . $fila['pnombre'] . '&nbsp' . $fila['papellido'] . '</td>
            <td>' . $html[$fila['estadocita']] . '</td>
            <td>
            
            
              <a href="editarafiliados.php?id=' . $fila['numero'] . '" title="Editar datos" class="btn btn-success  btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a>
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
    <script src="js/js/jquery.min.js"></script>
    <script src="js/js/jquery2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mitabla').DataTable();
        });
    </script>
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@ MODAL DE COMENTARIO @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    
        <!-- Modal -->
        <div id="add-stock" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div style="color:white; background-color:#6082b4" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Agendar Cita</h4>
                    </div>
                    <div class="modal-body">
                    <form id="myForm" action="acciones/agendarcita.php" method="POST">
    <form class="form-horizontal" action="acciones/agendarcita.php" method="POST">
    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Dia Cita</label>
                                    <input type="date" class="form-control" name="diacita" id="diacita" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Hora Cita</label>
                                    <input type="time" class="form-control" name="horacita" id="horacita" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Nombre Especialista</label>
                                    <select class="form-control" name="especialista">
                                        <option value="">SELECCIONAR</option>
                                        <option value="YORDIS ESCORCIA">YORDIS ESCORCIA</option>
                                        <option value="DAIRO BARRIOS">DAIRO BARRIOS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Documento</label>
                                    <input type="text" name="numero" id="numero" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Nombre</label>
                                    <input type="text" name="pnombre" id="pnombre" class="form-control"  readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Apellido</label>
                                    <input type="text" name="papellido" id="papellido" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                            <label>Usuario</label>
                                <input name="usuario" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Estado Cita</label>
                                <select class="form-control" name="estadocita" required>
                                    <option value="">SELECCIONAR</option>
                                    <option value="POR ATENDER">POR ATENDER</option>
                                    <option value="ATENDIDO">ATENDIDO</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        
                        <button name="insert" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                        </form>
    </form>

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
                    </div>
                </div>

            </div>
        </div>
    
    <?php
    include('includes/scripts.php');
    ?>