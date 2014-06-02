<?php 

class Core
{
	public $objLanguaje;
	public $lang_menu;

	public $objUrl;
	public $objNavigation;

	public $objAdmin;
	public $admin;

	public $navigation;

	public $navigation_1;
	public $navigation_2;
	public $navigation_3;

	public $meta_title;
	public $meta_description;
	public $meta_keywords;

	public $content;
	public $column;

	public $script;


	public function run()
	{
		$this->objLanguaje = new Languaje();
		$this->lang_menu = Helper::getPlug(
			'languaje',
			array('objLanguaje' => $this->objLanguaje)
			);

		$this->objUrl = new Url();
		$this->navigation = new Navigation($this->objUrl, $this->objLanguaje);

		switch ($this->objUrl->module) {
			case 'panel':
				set_include_path(implode(PATH_SEPARATOR, array(
					realpath(TEMPLATE_PATH.DS.'admin'),
					get_include_path()
					)));
				$this->runAdmin();
				break;
			
			default:
				set_include_path(implode(PATH_SEPARATOR, array(
					realpath(TEMPLATE_PATH.DS.'front'),
					get_include_path()
					)));

				$this->runFront();
				break;

		}
	}	





}









 ?>