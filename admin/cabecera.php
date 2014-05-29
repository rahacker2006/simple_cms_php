<?php
    session_start();
    if (!$_SESSION['id']) header('Location:entrada.php');
    else $id = $_SESSION['id'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css" />
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="articulos.php">Artículos</a></li>
            <li><a href="comentarios.php">Comentarios</a></li>
            <li><a href="categorias.php">Categorías</a></li>
            <li><a href="menu.php">Menú</a></li>
            <li><a href="barra_lateral.php">Barra lateral</a></li>
            <li style="margin-left:50px"><a href="entrada.php?accion=salir">Salir</a></li>
        </ul>
    </div>
    <div id="contenido">
   
   
 <a style="position:absolute;bottom:0;left:0; background:#fff;height:100px; width: 100%;text-align:center;text-decoration:none; color:#444444;font-size:40px;line-height:100px" href="http://vanuta.com/tutoriales/crear-un-cms-preparando-el-area-de-administracion/">Volver al tutorial</a>