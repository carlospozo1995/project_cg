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

        public function optionsCategorias($idCategoria)
        {   
            $this->intCategoria = $idCategoria;
            $retutnId = "";
            if (!empty($this->intCategoria)){
                $retutnId = " AND idcategoria != $this->intCategoria";
            }

            $sql = "SELECT * FROM project_cg.categorias WHERE status != 0" .$retutnId;
            $request = $this->selectAll($sql);
            return $request;
        }

        public function insertCategoria(string $titulo, string $imgPortada, $fatherCategoria, int $status )
        {
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

            $sql_exists_categoria = "SELECT * FROM project_cg.categorias WHERE nombre = '$this->strCategoria' AND categoria_father_id is null";

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

            $sql_exists_categoria = "SELECT * FROM project_cg.categorias WHERE nombre = '{$this-> strCategoria}' AND idcategoria != $this->intIdCategoria AND categoria_father_id is null";
            $request = $this->selectAll($sql_exists_categoria);

            if (empty($request)) {
                $sql_update_categoria = "UPDATE project_cg.categorias SET nombre = '$this->strCategoria',  imgcategoria= $data_img, categoria_father_id = $this->intCategoria, status = $this->intStatus WHERE idcategoria = $this->intIdCategoria";
                $request = $this->update($sql_update_categoria);
            }else{
                $request = 'existe';
            }
            return $request;
        }

        public function allCategorias()
        {
            $sql_categorias = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.status != 0";
            $request = $this->selectAll($sql_categorias);
            return $request;
        }

        public function selectCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            
            $sql_select_categoria = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.idcategoria = $this->intIdCategoria";
            $request = $this->select( $sql_select_categoria);
            return $request;
        }

        public function deleteCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            $sql_exists_productos = "SELECT * FROM project_cg.productos WHERE categoriaid = $this->intIdCategoria";
            $request = $this->selectAll($sql_exists_productos);
            

            if (empty($request)) {
                $sql_update_status_categoria = "UPDATE project_cg.categorias SET status = 0 WHERE idcategoria = $this->intIdCategoria";
                
                $request = $this->update($sql_update_status_categoria);

                if ($request) {
                    $request = "ok";
                }
                else{
                    $request = "error";
                }
            }else{
                $request = "productExist";
            }
            return $request;
        }
    }
    
?>
