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

        public function insertCategoria(string $titulo, string $imgPortada, $fatherCategoria, int $status ){
            $return = "";
            $data_img = "";
            $this->strCategoria = $titulo;
            $this->strImgPortada = $imgPortada;
            $this->intCategoria = $fatherCategoria;
            $this->intStatus = $status;
            
            if ($this->strImgPortada == 'NULL') {
                $data_img = $this->strImgPortada;
            }else{
                $data_img = "'$this->strImgPortada'";
            }

            $sql_exists_categoria = "SELECT * FROM project_cg.categorias WHERE nombre = '$this->strCategoria'";

            $request = $this->selectAll($sql_exists_categoria);

            if(empty($request)){
                $sql_insert_categoria = "INSERT INTO project_cg.categorias(nombre, imgCategoria, categoria_father_id, status) VALUES('$this->strCategoria', $data_img, $this->intCategoria, $this->intStatus)";
                $request = $this->insert($sql_insert_categoria);
                $return = $request;
            }else{
                $return = "existe";
            }
            return $return;
        }

        public function selectCategorias()
        {
            $sql_all_categorias = "SELECT  * FROM project_cg.categorias WHERE status != 0 AND categoria_father_id is NULL";
            $request = $this->selectAll($sql_all_categorias);
            return $request;
        }

        // public function electSubcategorias($fatherId)
        // {
        //     $sql_all_subcategorias = "SELECT  * FROM project_cg.categorias WHERE status != 0 AND categoria_father_id = $fatherId";
        //     $request = $this->selectAll($sql_all_subcategorias);
        //     return $request;
        // }
    }

?>