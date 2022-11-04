<?php

	class Tienda extends Controller{

		public function __construct()
		{
			parent::__construct();
		}


		public function tienda()
		{
			$data['page_title'] = 'Créditos GUAMAN - Todo para el hogar';
			$this->views->getView($this, "tienda", $data);
		}
	}

?>