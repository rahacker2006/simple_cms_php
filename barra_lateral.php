<div id="barra_lateral">
<?php
	$id = 2; // Identificador de la barra lateral que queremos mostrar
	$sql = sprintf("SELECT contenido FROM barra_lateral WHERE id = '$id' LIMIT 1");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	$barra = mysql_fetch_array($res);
	echo $barra['contenido'];
?>	
	</div>