<?php
class Languaje{

	private $table = 'languages';
	private $table_2 = 'labels';
	private $table_3 = 'labels_content';
	private $table_4 = 'labels_types';
	private $table_5 = 'languages_content';
	private $table_6 = 'labels_types_content';
	private $table_7 = 'pages_content';
	private $table_8 = 'navigation_types_content';

	public $languaje = 1;
	private $Db;

	public $labels = array();

	public function __construct()
	{
		if (!empty($_COOKIE['lang'])) {
			$this->languaje = $_COOKIE['lang'];
		}


		$this->Db = new Dbase();
		$this->getLabels();
	}

    public function getLabels()
    {

    }
}

 ?>