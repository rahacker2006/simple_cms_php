<?php 
	include 'cabecera.php';	
	include 'includes/config.php';
	$sql = sprintf("SELECT * FROM articulos ORDER BY id DESC");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
?>

	<div id="contenido_izq">
	<p>A continuación puedes ver todas las entradas que se han escrito desde el panel de administración (¡sin censura!). Este comentario es para GitHub</p>
	<?php while ($post = mysql_fetch_array($res)) { 
		$id = $post['categoria'];
		$sql = sprintf("SELECT categoria FROM categorias WHERE id = '$id'");
		$categoria = mysql_query($sql); 
		$categoria = mysql_fetch_array($categoria); ?>
		<h2><a href="individual.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a></h2>
		<p><?php echo $post['contenido'] ?> </p>
		<p><?php echo $categoria['categoria']; ?></p>
	<?php } ?>
	
	</div>
	
	<?php include 'barra_lateral.php' ?>
</div>