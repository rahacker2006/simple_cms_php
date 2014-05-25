<?php include 'cabecera.php';
include '../includes/config.php';
	if($_GET['a'] == "c") {
		$barra = $_POST['barra'];
		$sql = sprintf("INSERT INTO barra_lateral VALUES (NULL, '$barra')");
		$res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
	} else if($_GET['a'] == "m") {
		$nombre = $_POST['barra'];
		$id = $_GET['id'];
		$sql = sprintf("UPDATE barra_lateral SET contenido = '$barra' WHERE id = '$id'");
		$res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
	}

	if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
		$id = $_GET['id'];
		$sql = sprintf("DELETE FROM barra_lateral WHERE id = '$id'");
		$del = mysql_query($sql);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo "La categoría ha sido eliminado correctamente.";
	}
	
	$sql = sprintf("SELECT id, contenido FROM barra_lateral ORDER BY id DESC");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());

 ?>
<div id="izquierda">
<h2>Barra lateral</h2> <a href="?accion=crear">Crear nueva barra lateral</a>
<table id="articulos">
			<thead>
				<tr>
					<th scope="col">Identificador</th>
					<th scope="col">Modificar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($barra = mysql_fetch_array($res)) { ?>
				<tr>
					<td class="titulo"><a href="barra_lateral.php?id=<?php echo $barra['id'] ?>"><?php echo $barra['id'] ?></a></td>
					<td><a href="barra_lateral.php?id=<?php echo $barra['id'] ?>"><img src="../imagenes/editar.png"></a></td>
					<td><a href="barra_lateral.php?accion=eliminar&id=<?php echo $barra['id'] ?>"><img src="../imagenes/eliminar.png"></a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
</div>
<div id="derecha">
<?php if($_GET['accion'] == "crear") { ?>
	<h2>Alta nueva barra lateral</h2>
	<form method="post" action="barra_lateral.php?a=c">
		<label for="barra">Contenido</label>
		<textarea name="barra"></textarea>
		<input type="submit" value="Crear">
	</form>
<?php } else if ($_GET['id']) {
	$id = $_GET['id'];
	$sql = sprintf("SELECT id, contenido FROM barra_lateral WHERE id = '$id' LIMIT 1");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	$barra = mysql_fetch_array($res)
?>
	<h2>Modificar barra lateral</h2>
	<form method="post" action="barra_lateral.php?a=m&id=<?php echo $_GET['id'] ?>">
		<label for="barra">Contenido</label>
		<textarea name="barra"><?php echo $barra['contenido'] ?></textarea>
		<input type="submit" value="Modificar">
	</form>
<?php } ?>
</div>