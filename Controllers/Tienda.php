<?php

	class Tienda extends Controller{

		public function __construct()
		{
			parent::__construct();
		}


		public function tienda()
		{
			$this->views->getView($this, "tienda");
		}
	}

?>