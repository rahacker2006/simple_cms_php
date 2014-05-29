<?php 
	include 'cabecera.php';	
	include '../includes/config.php';
	if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
		$id = $_GET['id'];
		$sql = sprintf("DELETE FROM articulos WHERE id = '$id'");
		$del = mysql_query($sql);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo "El artículo ha sido eliminado correctamente.";
	}
	$sql = sprintf("SELECT id, titulo FROM articulos ORDER BY id DESC");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	

?>
		<p>A continuación puedes ver todas las entradas que hay publicadas. Desde aquí puedes modificarlas o eliminarlas. También crear de nuevas.</p>
		<div class="nuevo-articulo" style="text-align:center; ">
			<a style="font-size:24px; color:#444; padding:5px; border: 1px solid #444; background: #fff" href="articulos.php">Crear nuevo artículo</a>
		</div>
		<table id="articulos">
			<thead>
				<tr>
					<th scope="col">Título del artículo</th>
					<th scope="col">Modificar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($post = mysql_fetch_array($res)) { ?>
				<tr>
					<td class="titulo"><a href="articulos.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a></td>
					<td><a href="articulos.php?id=<?php echo $post['id'] ?>"><img src="../imagenes/editar.png"></a></td>
					<td><a href="index.php?accion=eliminar&id=<?php echo $post['id'] ?>"><img src="../imagenes/eliminar.png"></a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		
