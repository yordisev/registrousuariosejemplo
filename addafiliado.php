<?php

if ($_GET['form'] == 'add') { ?>

    <?php
    include('includes/navbar.php');
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Dashboard</h3>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Primary Panel
                </div>
                <div class="panel-body">
                    <form method="POST" action="acciones/afiliados.php?act=insert">
                        <div id="result"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tipo de Documento</label>
                                    <select class="form-control" name="documento">
                                        <option value="">SELECCIONAR</option>
                                        <option value="CC">CEDULA DE CIUDADANIA</option>
                                        <option value="TI">TARJETA DE IDENTIDAD</option>
                                        <option value="RC">REGISTRO CIVIL</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Numero</label>
                                    <input type="text" class="form-control" name="numero" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Primer nombre</label>
                                    <input type="text" class="form-control" name="pnombre" autocomplete="off" onkeyup="mayus(this);" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Segundo Nombre</label>
                                    <input type="text" class="form-control" name="snombre" autocomplete="off" onkeyup="mayus(this);" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Primer Apellido</label>
                                    <input type="text" class="form-control" name="papellido" autocomplete="off" onkeyup="mayus(this);" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Segundo Apellido</label>
                                    <input type="text" class="form-control" name="sapellido" autocomplete="off" onkeyup="mayus(this);" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechan" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Sexo</label>
                                    <select class="form-control" name="sexo">
                                        <option value="">SELECCIONAR</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Tipo de Sangre</label>
                                    <select class="form-control" name="tsangre">
                                        <option value="">RH</option>
                                        <option value="MASCULINO">O+</option>
                                        <option value="FEMENINO">O-</option>
                                        <option value="MASCULINO">A+</option>
                                        <option value="FEMENINO">A-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Estado Civil</label>
                                    <select class="form-control" name="estadoc">
                                        <option value="">SELECCIONAR</option>
                                        <option value="SOLTERO">SOLTERO</option>
                                        <option value="CASADO">CASADO</option>
                                        <option value="UNION LIBRE">UNION LIBRE</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="telefono" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Correo</label>
                                    <input type="text" class="form-control" name="correo" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Ciudad</label>
                                    <select class="form-control" name="ciudad">
                                        <option value="">SELECCIONAR</option>
                                        <option value="BARRANQUILLA">BARRANQUILLA</option>
                                        <option value="CARTAGENA">CARTAGENA</option>
                                        <option value="BOGOTA">BOGOTA</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Barrio</label>
                                    <input type="text" class="form-control" name="barrio" autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Estado</label>
                                    <select class="form-control" name="estado">
                                        <option value="">SELECCIONAR</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>




                </div>
                <div class="panel-footer">
                    <center>
                        <button type="submit" name="Guardar" class="btn btn-outline btn-primary">Guardar</button>
                        <a href="afiliados.php" class="btn btn-outline btn-danger">Atras</a>
                    </center>
                </div>
                </form>
            </div>
        </div>
        <?php
        include('includes/scripts.php');
        ?>

    <?php
} elseif ($_GET['form'] == 'edit') {
    if (isset($_GET['id'])) {

        include('includes/navbar.php');


        require_once "config/database.php";

        $id = mysqli_real_escape_string($mysqli, (strip_tags($_GET["id"], ENT_QUOTES)));
        $sql = mysqli_query($mysqli, "SELECT * FROM db_afiliados WHERE numero='$id'");
        if (mysqli_num_rows($sql) == 0) {
            header("Location: index.php");
        } else {
            $row = mysqli_fetch_assoc($sql);
        }
    }
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Primary Panel
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="acciones/afiliados.php?act=update">
                            <div id="result"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tipo de Documento</label>
                                        <select class="form-control" name="documento">
                                            <option><?php echo $row['documento']; ?></option>
                                            <option value="CC">CEDULA DE CIUDADANIA</option>
                                            <option value="TI">TARJETA DE IDENTIDAD</option>
                                            <option value="RC">REGISTRO CIVIL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Numero</label>
                                        <input type="text" class="form-control" name="numero" value="<?php echo $row['numero']; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Primer nombre</label>
                                        <input type="text" class="form-control" name="pnombre" value="<?php echo $row['pnombre']; ?>" autocomplete="off" onkeyup="mayus(this);" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Segundo Nombre</label>
                                        <input type="text" class="form-control" name="snombre" value="<?php echo $row['snombre']; ?>" autocomplete="off" onkeyup="mayus(this);" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Primer Apellido</label>
                                        <input type="text" class="form-control" name="papellido" value="<?php echo $row['papellido']; ?>" autocomplete="off" onkeyup="mayus(this);" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Segundo Apellido</label>
                                        <input type="text" class="form-control" name="sapellido" value="<?php echo $row['sapellido']; ?>" autocomplete="off" onkeyup="mayus(this);" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fechan" value="<?php echo $row['fechan']; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Sexo</label>
                                        <select class="form-control" name="sexo">
                                            <option><?php echo $row['sexo']; ?></option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tipo de Sangre</label>
                                        <select class="form-control" name="tsangre">
                                            <option><?php echo $row['tsangre']; ?></option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Estado Civil</label>
                                        <select class="form-control" name="estadoc">
                                            <option><?php echo $row['estadoc']; ?></option>
                                            <option value="SOLTERO">SOLTERO</option>
                                            <option value="CASADO">CASADO</option>
                                            <option value="UNION LIBRE">UNION LIBRE</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Correo</label>
                                        <input type="text" class="form-control" name="correo" value="<?php echo $row['correo']; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Ciudad</label>
                                        <select class="form-control" name="ciudad">
                                            <option><?php echo $row['ciudad']; ?></option>
                                            <option value="BARRANQUILLA">BARRANQUILLA</option>
                                            <option value="CARTAGENA">CARTAGENA</option>
                                            <option value="BOGOTA">BOGOTA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Barrio</label>
                                        <input type="text" class="form-control" name="barrio" value="<?php echo $row['barrio']; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Direccion</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado">
                                            <option><?php echo $row['estado']; ?></option>
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="INACTIVO">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>




                    </div>
                    <div class="panel-footer">
                        <center>
                            <button type="submit" name="Guardar" class="btn btn-outline btn-primary">Guardar</button>
                            <a href="afiliados.php" class="btn btn-outline btn-danger">Atras</a>
                        </center>
                    </div>
                    </form>
                </div>
            </div>
            <?php
            include('includes/scripts.php');
            ?>

        <?php
    } elseif ($_GET['form'] == 'vista') {
        if (isset($_GET['id'])) {

            include('includes/navbar.php');


            include "config/database.php";

            $id = mysqli_real_escape_string($mysqli, (strip_tags($_GET["id"], ENT_QUOTES)));
            $sql = mysqli_query($mysqli, "SELECT * FROM db_afiliados WHERE numero='$id'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: index.php");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }
        }
        ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">HISTORIAL DE CITAS</h3>
                    </div>
                </div>
                <form method="POST" action="acciones/afiliados.php?act=update">
                    <div id="result"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo de Documento</label>
                                <input type="text" class="form-control" name="documento" value="<?php echo $row['documento']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Numero</label>
                                <input type="text" class="form-control" name="numero" value="<?php echo $row['numero']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Primer nombre</label>
                                <input type="text" class="form-control" name="pnombre" value="<?php echo $row['pnombre']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Segundo Nombre</label>
                                <input type="text" class="form-control" name="snombre" value="<?php echo $row['snombre']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Primer Apellido</label>
                                <input type="text" class="form-control" name="papellido" value="<?php echo $row['papellido']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Segundo Apellido</label>
                                <input type="text" class="form-control" name="sapellido" value="<?php echo $row['sapellido']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fechan" value="<?php echo $row['fechan']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Sexo</label>
                                <input type="text" class="form-control" name="sexo" value="<?php echo $row['sexo']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Tipo de Sangre</label>
                                <input type="text" class="form-control" name="tsangre" value="<?php echo $row['tsangre']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Estado Civil</label>
                                <input type="text" class="form-control" name="estadoc" value="<?php echo $row['estadoc']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Correo</label>
                                <input type="text" class="form-control" name="correo" value="<?php echo $row['correo']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" value="<?php echo $row['ciudad']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Barrio</label>
                                <input type="text" class="form-control" name="barrio" value="<?php echo $row['barrio']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Direccion</label>
                                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="estado" value="<?php echo $row['estado']; ?>" readonly>
                            </div>
                        </div>
                    </div>








                </form>


                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <a href="" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#add-stock">AÑADIR COMENTARIO</a>
                            <a href="afiliados.php" class="btn btn-outline btn-danger">Atras</a>
                        </div>
                    </div>
                </div><!-- /.box footer -->
                <table class="table table-bordered table-striped table-hover">
                    <tr style="color:white; background-color:#6082b4">
                        <th class='text-center' colspan=5>HISTORIAL DE COMENTARIO</th>
                    </tr>
                    <tr class='text-center' style="color:white; background-color:#6082b4">
                        <th class="center">N</th>
                        <th class="center">DIA</th>
                        <th class="center">HORA</th>
                        <th class="center">ESPECIALISTA</th>
                    </tr>
                    <?php




                    $no = 1;
                    $query = mysqli_query($mysqli, "SELECT * FROM db_historial WHERE numero='$id'")
                        or die('error: ' . mysqli_error($mysqli));
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                      <tr>
                        <td width="30" class="center">' . $no . '</td>
                        <td width="80" class="center">' . $data['diacita'] . '</td>
                        <td width="80" class="center">' . $data['horacita'] . '</td>
						<td width="80" class="center">' . $data['especialista'] . '</td>
                      </tr>
                      ';
                        $no++;
                    }
                    ?>
                </table>

                <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@ MODAL DE COMENTARIO @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
                <form class="form-horizontal" action="acciones/insertcomentario.php" method="POST">
                    <!-- Modal -->
                    <div id="add-stock" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div style="color:white; background-color:#6082b4" class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Agregar Comentario</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Dia Cita</label>
                                                <input type="date" class="form-control" name="diacita" id="diacita" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Hora Cita</label>
                                                <input type="time" class="form-control" name="horacita" id="horacita" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Especialidad</label>
                                                <select class="form-control" name="especialidad">
                                                    <option value="">SELECCIONAR</option>
                                                    <option value="GINECOLOGIA">GINECOLOGIA</option>
                                                    <option value="DERMATOLOGO">DERMATOLOGO</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
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
                                            <div class="col-md-3">
                                                <label>Cedula</label>
                                                <input name="numero" class="form-control" value="<?php echo $row['numero']; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Primer nombre</label>
                                                <input type="text" class="form-control" name="pnombre" value="<?php echo $row['pnombre']; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Primer Apellido</label>
                                                <input type="text" class="form-control" name="papellido" value="<?php echo $row['papellido']; ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Segundo Apellido</label>
                                                <input type="text" class="form-control" name="sapellido" value="<?php echo $row['sapellido']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label class="col-sm-4 control-label"><b>USUARIO</b></label> -->
                                        <div class="col-sm-4">
                                            <input name="usuario" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <textarea rows="5" cols="50" name="asuntocita" required></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Estado Cita</label>
                                                <select class="form-control" name="estadocita">
                                                    <option value="">SELECCIONAR</option>
                                                    <option value="POR ATENDER">POR ATENDER</option>
                                                    <option value="ATENDIDO">ATENDIDO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button name="insert" type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <?php
            include('includes/scripts.php');
            ?>
        <?php
    }
        ?>