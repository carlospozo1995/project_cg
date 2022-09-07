<?php

    class CategoriasModel extends Mysql{

        public $intIdCategoria;
        public $strCategoria;
        public $intCategoria;
        public $strImgPortada;
        public $intStatus;

        function __construct(){
            parent::__construct();
        }

        public function allCategorias($idCategoria)
        {   
            $this->intCategoria = $idCategoria;
            $retutnId = "";
            if (!empty($this->intCategoria)){
                $retutnId = " AND idcategoria != $this->intCategoria";
            }

            $sql = "SELECT * FROM project_cg.categorias WHERE status = 1" .$retutnId;
            $request = $this->selectAll($sql);
            return $request;
        }
    }
    

?>




