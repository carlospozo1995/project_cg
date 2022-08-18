<?php

    class CategoriasModel extends Mysql{
        public $intIdCategory;
        public $strCategory;
        public $strDescripcion;
        public $strImgPortada;
        public $intStatus;

        function __construct(){
            parent::__construct();
        }

        public function insertCategory(string $nameCategory, string $descripcion, string $imgPortada, int $status)
        {
            $return = "";
            $this->strCategory = $nameCategory;
            $this->strDescripcion = $descripcion;
            $this->strImgPortada = $imgPortada;
            $this->intStatus = $status;

            $sql_exists_category = "SELECT * FROM project_cg.categoria WHERE nombre = '$this->strCategory'";

            $request = $this->selectAll($sql_exists_category);

            if (empty($request)) {
                $sql_insert_category = "INSERT INTO project_cg.categoria(nombre, descripcion, portada, status) VALUES('$this->strCategory', '$this->strDescripcion', '$this->strImgPortada', $this->intStatus)";
                
                $request = $this->insert($sql_insert_category);
                $return = $request;
            }else{
                $return = "existe";
            }

            return $return;
        }

        public function selectCategorias()
        {
            $sql_all_categorias = "SELECT  * FROM project_cg.categoria WHERE status != 0";
            $request = $this->selectAll($sql_all_categorias);
            return $request;
        }
    }

?>