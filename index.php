
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="vendor/icono-inicio.png" />
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

      <!-- Bootstrap Core CSS -->
      <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->



    <!-- Custom CSS -->
    <link href="vendor/sb-admin-2.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">
  <div class="container">
  
    <div class="row justify-content-center" style="margin-top: 130px;">
    
      <div class="login-box-body col-xl-4">
        <center>
          <div style="color:white" class="login-logo">
      <img style="margin-top:-12px" src="vendor/icono-inicio.png" alt="Logo" height="150">
      </div><!-- /.login-logo -->
        </center>
        
        <hr>
         
            <?php  
 
 if (empty($_GET['alert'])) {
   echo "";
 } 

 elseif ($_GET['alert'] == 1) {
   echo "<div class='alert alert-danger alert-dismissable'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
           <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
          Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.
         </div>";
 }

 elseif ($_GET['alert'] == 2) {
   echo "<div class='alert alert-success alert-dismissable'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
           <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
         Has salido con éxito.
         </div>";
 }
 ?>
              <center>
                <h3>Iniciar Sesion</h3>
              </center>
          
            <center>
              <hr>
              <form action="login-check.php" method="POST">
                <div class="form-group">
                  <div class="col-xl-10">
                    <input type="text" class="form-control" name="username" placeholder="Usuario" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xl-10">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar" />
              </form>
            </center>
       
        
      </div>
    </div>
  </div>

</body>

</html>