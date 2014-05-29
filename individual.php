<?php 
	include 'cabecera.php';	
	include 'includes/config.php';
	$id = $_GET['id'];
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$comentario = $_POST['comentario'];
		$sql = sprintf("INSERT INTO comentarios VALUES (NULL, '$id', '$nombre', '$comentario', 0)");
		$res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
	}
	$sql = sprintf("SELECT * FROM articulos WHERE id = '$id' LIMIT 1");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
?>

	<div id="contenido_izq">
	<p>Lo de aquí abajo es un artículo completo :D.</p>
	<?php while ($post = mysql_fetch_array($res)) { 
		$ids = $post['categoria'];
		$sql = sprintf("SELECT categoria FROM categorias WHERE id = '$ids'");
		$categoria = mysql_query($sql); 
		$categoria = mysql_fetch_array($categoria); ?>
		<h2><?php echo $post['titulo'] ?></h2>
		<?php echo $post['contenido'] ?>
		<p><?php echo $categoria['categoria']; ?></p>
	<?php } ?>
	<h3>Comentarios</h3>
	<?php $sql = sprintf("SELECT * FROM comentarios WHERE articulo = '$id' and estado = 1");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error()); ?>
	<?php while ($comentario = mysql_fetch_array($res)) { ?>
		<?php echo strip_tags($comentario['nombre']) ?><br>
		<?php echo strip_tags($comentario['comentario']) ?> <br><br>
	<?php } ?>
	
	<form action="individual.php?id=<?php echo $id ?>" method="POST">
	<label for="nombre">Nombre:</label><input type="text" name="nombre"><br>
	<label for="comentario">Comentario:</label><textarea name="comentario"></textarea>
	<input type="submit" value="Enviar">
	</form>
	</div>
	<?php include 'barra_lateral.php' ?>
</div>