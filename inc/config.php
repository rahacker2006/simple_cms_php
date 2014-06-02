<?php 

date_default_timezone_set('America/Asuncion');

define("PAGE_EXT") || define("PAGE_EXT", '.html');

define("DS") || define("DS", DIRECTORY_SEPARATOR);

define("ROOT_PATH") || define("ROOT_PATH", realpath(dirname(__FILE__) . DS . ".." . DS));

define("CLASSES_PATH") || define("CLASSES_PATH", ROOT_PATH.DS.'classes');

define("TEMPLATE_PATH") || define("TEMPLATE_PATH", ROOT_PATH.DS.'template');

set_include_path(implode(PATH_SEPARATOR, array(
	realpath(ROOT_PATH),
	realpath(CLASSES_PATH),
	get_include_path()
)));
?>