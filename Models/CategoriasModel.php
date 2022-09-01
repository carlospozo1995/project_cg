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

        //INSERTAR CATEGORIA 
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

        public function updateCategoria(int $idcategoria, string $titulo, string $imgPortada, $fatherCategoria, int $status)
        {
            $this->intIdCategoria = $idcategoria;
            $this->strCategoria = $titulo;
            $this->strImgPortada = $imgPortada;
            $this->intCategoria = $fatherCategoria;
            $this->intStatus = $status;

            if ($this->strImgPortada == 'NULL') {
                $data_img = $this->strImgPortada;
            }else{
                $data_img = "'$this->strImgPortada'";
            }

            $sql_exists_categoria = "SELECT * FROM project_cg.categorias WHERE nombre = '{$this-> strCategoria}' AND idcategoria != $this->intIdCategoria";
            $request = $this->selectAll($sql_exists_categoria);

            if (empty($request)) {
                $sql_update_categoria = "UPDATE project_cg.categorias SET nombre = '$this->strCategoria',  imgcategoria= $data_img, categoria_father_id = $this->intCategoria, status = $this->intStatus WHERE idcategoria = $this->intIdCategoria";
                $request = $this->update($sql_update_categoria);
            }else{
                $request = 'existe';
            }
            return $request;
        }

        // PINTAR CATEGORIAS EN UN SELECT
        public function selectCategorias()
        {
            $sql_all_categorias = "SELECT  * FROM project_cg.categorias WHERE categoria_father_id is NULL AND status != 0";
            $request = $this->selectAll($sql_all_categorias);
            return $request;
        }

        public function selectSubcategorias($fatherId)
        {
            $sql_all_subcategorias = "SELECT  * FROM project_cg.categorias WHERE status != 0 AND categoria_father_id = $fatherId";
            $request = $this->selectAll($sql_all_subcategorias);
            return $request;
        }
        // ---------------------------------------------

        // SELECIONAR TODAS LAS CATEGORIAS
        public function allCategorias()
        {
            $sql_categorias = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.status != 0";
            $request = $this->selectAll($sql_categorias);
            return $request;
        }

        // SELECIONAR UNA CATEGORIA ESPECIFICA
        public function selectCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            
            $sql_select_categoria = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.idcategoria = $this->intIdCategoria";
            $request = $this->select( $sql_select_categoria);
            return $request;
        }
    }

?>




