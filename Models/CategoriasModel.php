<?php

    class CategoriasModel extends Mysql{
        public $intIdCategoria;
        public $strCategoria;
        public $strDescripcion;
        public $strImgPortada;
        public $intStatus;

        function __construct(){
            parent::__construct();
        }

        public function insertCategoria(string $nameCategoria, string $descripcion, string $imgPortada, int $status)
        {
            $return = "";
            $this->strCategoria = $nameCategoria;
            $this->strDescripcion = $descripcion;
            $this->strImgPortada = $imgPortada;
            $this->intStatus = $status;

            $sql_exists_categoria = "SELECT * FROM project_cg.categoria WHERE nombre = '$this->strCategoria'";

            $request = $this->selectAll($sql_exists_categoria);

            if (empty($request)) {
                $sql_insert_categoria = "INSERT INTO project_cg.categoria(nombre, descripcion, portada, status) VALUES('$this->strCategoria', '$this->strDescripcion', '$this->strImgPortada', $this->intStatus)";
                
                $request = $this->insert($sql_insert_categoria);
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

        public function selectCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            
            $sql_select_categoria = "SELECT * FROM project_cg.categoria WHERE idcategoria = $this->intIdCategoria";
            $request = $this->select( $sql_select_categoria);
            return $request;
        }

        public function updateCategoria(int $idcategoria, string $nameCategoria, string $descripcion, string $imgPortada, int $status)
        {
            $this->intIdCategoria = $idcategoria;
            $this->strCategoria = $nameCategoria;
            $this->strDescripcion = $descripcion;
            $this->strImgPortada = $imgPortada;
            $this->intStatus = $status;

            $sql_exists_categoria = "SELECT * FROM project_cg.categoria WHERE nombre = '{$this-> strCategoria}' AND idcategoria != $this->intIdCategoria";
            $request = $this->selectAll($sql_exists_categoria);

            if (empty($request)) {
                $sql_update_categoria = "UPDATE project_cg.categoria SET nombre = '$this->strCategoria', descripcion = '$this->strDescripcion', portada = '$this->strImgPortada', status = $this->intStatus WHERE idcategoria = $this->intIdCategoria";
                $request = $this->update($sql_update_categoria);
            }else{
                $request = 'existe';
            }
            return $request;
        }

        public function deleteCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            $sql_exists_productos = "SELECT * FROM project_cg.productos WHERE categoriaid = $this->intIdCategoria";
            $request = $this->selectAll($sql_exists_productos);

            if (empty($request)) {
                $sql_update_status_categoria = "UPDATE project_cg.categoria SET status = 0 WHERE idcategoria = $this->intIdCategoria";
                
                $request = $this->update($sql_update_status_categoria);

                if ($request) {
                    $request = "ok";
                }
                else{
                    $request = "error";
                }
            }else{
                $request = "existe";
            }
            return $request;
        }
    }

    

?>