<?php
      require_once "../config/database.php";
              
      $query1 = mysqli_query($mysqli, "SELECT * from actas_cargadas where id_documento=".$_GET['id'])
                    or die('error: ' . mysqli_error($mysqli));
                  while ($datos = mysqli_fetch_assoc($query1)) {
                if($datos['nombre_archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
                   <center>
                   <a href="../certificados.php" class="btn btn-danger">Atras</a>
                   </center> 
        <iframe width="1100" height="800" src="certificados/<?php echo $datos['nombre_archivo']; ?>"></iframe>
        
                <?php }}  ?>