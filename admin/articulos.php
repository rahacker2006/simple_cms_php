<?php include 'cabecera.php' ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="text/wysiwyg.js"></script>
<script src="text/articulos.js"></script>
<link rel="stylesheet" href="text/wysiwyg.css" type="text/css" charset="utf-8">
<?php $post = $_GET['id'];
include '../includes/config.php';
$cat = sprintf("SELECT * FROM categorias WHERE 1");
$c = mysql_query($cat);
if ($post > 0) {
	$sql = sprintf("SELECT * FROM articulos WHERE id = '$post'");
	$res = mysql_query($sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	$res = mysql_fetch_array($res);
	
} 
?>
<h2>Escribir un artículo</h2> 
<a style="float:right" href="index.php">Volver a artículos</a>
<form>
<div class="escritura">
	<label for="titulo">Título</label>
	<input type="text" value="<?php if ($post > 0) echo $res['titulo'] ?>" name="titulo">
	<input type="hidden" value="<?php echo $id ?>" name="autor">
	<input type="hidden" value="<?php echo $post ?>" name="post">
	<div class="area" contenteditable><?php if ($post > 0) echo $res['contenido'] ?></div>
	<select name="categoria">
		<?php while ($r = mysql_fetch_array($c)) { ?>
			<option <?php if($res['categoria'] == $r['id']) echo 'selected = "selected"' ?>name="categoria" value="<?php echo $r['id'] ?>"><?php echo $r['categoria']?></option>			
		<?php } ?>
	</select>
		
	<?php if ($post > 0) { ?>
	<div class="actualizar">Actualizar</div>
	<?php } else { ?>
	<div class="publicar">Publicar</div>
	<?php } ?>
	</form>
</div>
<script>
  var wysiwyg = new Wysiwyg;
  wysiwyg.el.insertBefore('.area');
</script>