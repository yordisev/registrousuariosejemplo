<?php  

if ($_GET['form']=='add') { ?>

<?php
include('includes/navbar.php');
?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Agregar Usuarios</h3>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            Agregar Usuarios
            </div>
            <div class="panel-body">
            <form method="POST" action="acciones/usuarios.php?act=insert" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="nombre" autocomplete="off" onkeyup="mayus(this);" required>
                            </div>
                            <div class="col-md-3">
                                <label>Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido" autocomplete="off" onkeyup="mayus(this);" required>
                            </div>
                            <div class="col-md-3">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fechan" autocomplete="off" required>
                            </div>
                            <div class="col-md-3">
                                <label>Sexo</label>
                                <select class="form-control" name="sexo">
                                    <option value="">SELECCIONAR</option>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="username" autocomplete="off" required>
                            </div>
                            <div class="col-md-3">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" autocomplete="off" required>
                            </div>
                            <div class="col-md-3">
                                <label>Permiso</label>
                                <select class="form-control" name="permisos">
                                    <option value="">SELECCIONAR</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Estado</label>
                                <select class="form-control" name="status">
                                    <option value="">SELECCIONAR</option>
                                    <option value="activo">activo</option>
                                    <option value="inactivo">inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
            </div>
            <div class="panel-footer">
                <center>
                   <button type="submit" name="Guardar" class="btn btn-outline btn-primary">Guardar</button>
            <a href="usuarios.php" class="btn btn-outline btn-danger">Atras</a> 
                </center>
            </div>
            </form>
        </div>
    </div>
    <?php
    include('includes/scripts.php');
    ?>
    
<?php
}

elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {
    
        include('includes/navbar.php');
    
        require_once "config/database.php";

        $id = mysqli_real_escape_string($mysqli,(strip_tags($_GET["id"],ENT_QUOTES)));
        $sql = mysqli_query($mysqli, "SELECT * FROM db_usuarios WHERE numero='$id'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: index.php");
        }else{
            $data = mysqli_fetch_assoc($sql);
        }
  	}	
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Agregar Usuarios</h3>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            Agregar Usuarios
            </div>
            <div class="panel-body">
            <form method="POST" action="acciones/usuarios.php?act=update">
                    <div id="result"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo de Documento</label>
                                <select class="form-control" name="documento">
                                    <option value="<?php echo $data['documento']; ?>"><?php echo $data['documento']; ?></option>
                                    <option value="CC">CEDULA DE CIUDADANIA</option>
                                    <option value="TI">TARJETA DE IDENTIDAD</option>
                                    <option value="RC">REGISTRO CIVIL</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Numero</label>
                                <input type="text" class="form-control" name="numero" autocomplete="off" value="<?php echo $data['numero']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Primer nombre</label>
                                <input type="text" class="form-control" name="nombre" autocomplete="off" value="<?php echo $data['nombre']; ?>" onkeyup="mayus(this);" required>
                            </div>
                            <div class="col-md-3">
                                <label>Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido" autocomplete="off" value="<?php echo $data['apellido']; ?>" onkeyup="mayus(this);" required>
                            </div>
                            <div class="col-md-3">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fechan" autocomplete="off" value="<?php echo $data['fechan']; ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label>Sexo</label>
                                <select class="form-control" name="sexo">
                                    <option value="<?php echo $data['sexo']; ?>"><?php echo $data['sexo']; ?></option>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" autocomplete="off" value="<?php echo $data['password']; ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label>Permiso</label>
                                <select class="form-control" name="permisos">
                                    <option value="<?php echo $data['permisos']; ?>"><?php echo $data['permisos']; ?></option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Estado</label>
                                <select class="form-control" name="status">
                                    <option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
            </div>
            <div class="panel-footer">
                <center>
                   <button type="submit" name="Guardar" class="btn btn-outline btn-primary">Guardar</button>
            <a href="usuarios.php" class="btn btn-outline btn-danger">Atras</a> 
                </center>
            </div>
            </form>
        </div>
    </div>
    <?php
    include('includes/scripts.php');
    ?>
<?php
}
?>