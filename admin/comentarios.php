<?php 
	include 'cabecera.php';	
	include '../includes/config.php';
	if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
		$id = $_GET['id'];
		$sql = sprintf("DELETE FROM comentarios WHERE id = '$id'");
		$del = mysql_query($sql);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo "El comentario ha sido eliminado correctamente.";
	}
	
	if (isset($_GET['accion']) && $_GET['accion'] == "aprobar") {
		$id = $_GET['id'];
		$sql = sprintf("UPDATE comentarios SET estado = 1 WHERE id = '$id'");
		$del = mysql_query($sql);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo "El comentario ha sido aprobado correctamente.";
	}
	
	$sql = sprintf("SELECT id, nombre, comentario, estado FROM comentarios ORDER BY id DESC");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	

?>
		<p>A continuación puedes ver todos los comentarios de tu sitio y aprobarlos, eliminarlos o no publicarlos.</p>

		<table id="articulos">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Comentario</th>
					<th scope="col">Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($com = mysql_fetch_array($res)) { ?>
				<tr>
					<td width="250px;"><?php echo strip_tags( $com['nombre']) ?></td>
					<td><?php echo strip_tags($com['comentario']) ?></td>
					<td>
					<?php if ($com['estado'] == 1) {
						echo "Publicado";
					} else {
						echo "Pendiente";
					} ?></td>
					<td><a href="comentarios.php?accion=eliminar&id=<?php echo $com['id'] ?>"><img src="../imagenes/eliminar.png"></a></td>
					<td><a href="comentarios.php?accion=aprobar&id=<?php echo $com['id'] ?>"><img src="../imagenes/ok.png"></a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>