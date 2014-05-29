<?php if ($_POST) {
	include '../../includes/config.php';
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];
	$autor = $_POST['autor'];
	$categoria = $_POST['categoria'];
	$id = $_POST['post'];
	echo $id;
	if ($id > 0) {
		$sql = sprintf("UPDATE articulos SET titulo = '$titulo', contenido = '$contenido', categoria = '$categoria' WHERE id = '$id'");
		$res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
	}
	else {
		$sql = sprintf("INSERT INTO articulos VALUES (NULL, '$titulo', '$contenido', '$autor', $categoria)");
		$res = mysql_query($sql);
        if (!$res) die('Invalid query: ' . mysql_error());
        $new_id = mysql_insert_id();
        echo $new_id;
    }

} ?>