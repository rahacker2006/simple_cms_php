<?php 
$nombre  = '';
$usuario = '';
$email = '';
$mensaje = '';
if($_POST) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    if ($nombre == "" or $usuario == "" or $contrasena == "" or $email == "") { 
        $mensaje= sprintf("Hay algún campo vacío");
    }
    else {
        include '../includes/config.php';
        $sql = sprintf("INSERT INTO usuarios VALUES (NULL,'$nombre','$usuario', md5('$contrasena'), '$email')");
        $res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
        $mensaje = sprintf("Usuario registrado correctamente");
       
    }

} ?>
 
 
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<link rel="stylesheet" type="text/css" href="../estilos/index.css">
<link rel="stylesheet" type="text/css" href="../estilos/bootstrap.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<style type="text/css" media="screen">
 
</style>
 
</head>
<body>
<div class="container">
<div class="registro">
    <?php if ($mensaje) { ?>
        <div class="alert alert-warning">
            <?php echo $mensaje ?>
        </div>
    <?php } ?>
</div>
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                     Por favor ingrese sus datos
                </div>
                <div class="panel-body">
                    <form action="registro.php" method="POST" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Ingrese un nombre" name="nombre" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Ingrese un usuario" name="usuario" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Ingrese una contraseña" name="contrasena" type="password">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Ingrese su email" name="email" value="">
                        </div>

                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Registrar" >

                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
</body>
</html>