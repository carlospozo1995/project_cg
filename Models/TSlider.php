<?php

	require_once("Libraries/Core/Mysql.php");

	class traitsSlider
	{
		use TSliderCtg, TSliderProd;
	}

	trait TSliderCtg{
		public $conexion; 

		public function getCtgT(string $idCtg)
		{	$request = "";

			if ($idCtg != "") {
				$this->conexion = new Mysql;
				$sql = "SELECT idcategoria, nombre, imgCategoria, sliderDesktop, sliderMobile, sliderDscOne, sliderDscTwo FROM categorias WHERE status = 1 AND sliderDesktop != '' AND idcategoria IN ($idCtg)";
				$request = $this->conexion->selectAll($sql);
				if (count($request) > 0) {
				 	for ($c=0; $c < count($request); $c++) { 
				 		$request[$c]['imgCategoria'] = BASE_URL.'Assets/images/uploads/'.$request[$c]['imgCategoria'];
				 		$request[$c]['sliderDesktop'] = BASE_URL.'Assets/images/uploads/'.$request[$c]['sliderDesktop'];
				 		$request[$c]['sliderMobile'] = BASE_URL.'Assets/images/uploads/'.$request[$c]['sliderMobile'];
				 		$request[$c]['sliderDscOne'] = $request[$c]['sliderDscOne'];
				 		$request[$c]['sliderDscTwo'] = $request[$c]['sliderDscTwo'];
				 	}
				} 
			}

			return $request;
		}
	}

	trait TSliderProd{
		public $conexion;

		public function getProdT(string $idProd)
		{
			$request = "";
			if ($idProd != "") {
				$this->conexion = new Mysql;

				$sql = "SELECT idproducto, nombre, sliderDesktop, sliderMobile, sliderDscOne, sliderDscTwo FROM productos WHERE status = 1 AND sliderDesktop != '' AND idproducto IN ($idProd)";
				$request = $this->conexion->selectAll($sql);

				if (count($request) > 0) {
				 	for ($p=0; $p < count($request); $p++) {
				 		$request[$p]['sliderDesktop'] = BASE_URL.'Assets/images/uploadsProduct/'.$request[$p]['sliderDesktop'];
				 		$request[$p]['sliderMobile'] = BASE_URL.'Assets/images/uploadsProduct/'.$request[$p]['sliderMobile'];
				 		$request[$p]['sliderDscOne'] = $request[$p]['sliderDscOne'];
				 		$request[$p]['sliderDscTwo'] = $request[$p]['sliderDscTwo'];
				 	}
				} 
			}

			return $request;
		}
	}

?>