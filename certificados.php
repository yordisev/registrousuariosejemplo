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
        <div class="box box-primary">
            <div class="box-body">
            <div class="table-responsive"> 
              <table id="mitabla" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr style='background-color:#A3CCFF'>
                    <th style="width: 200px;">Titulo</th>
                    <th style="width: 50px;"> Ver </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($mysqli, "SELECT * from actas_cargadas")
                    or die('error: ' . mysqli_error($mysqli));
                  while ($ruta = mysqli_fetch_assoc($query)) {
                  ?>
                    <tr>
                      <td width="70" class="center"><?php echo $ruta['titulo'] ?></td>
                     
                      <td><a href="acciones/archivo.php?id=<?php echo $ruta['id_documento']?>"><?php echo $ruta['nombre_archivo']; ?></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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