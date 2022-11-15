<?php

    class CategoriasModel extends Mysql{

        public $intIdCategoria;
        public $strCategoria;
        public $intCategoria;
        public $strImg;
        public $strIcon;
        public $intStatus;

        function __construct(){
            parent::__construct();
        }

        public function sqlCategorias($idCategoria)
        {   
            $this->intCategoria = $idCategoria;
            $retutnId = "";
            if (!empty($this->intCategoria)){
                $retutnId = " AND idcategoria != $this->intCategoria";
            }

            $sql = "SELECT * FROM categorias WHERE status != 0" .$retutnId;
            $request = $this->selectAll($sql);
            return $request;
        }

        public function allCategorias()
        {
            $sql_categorias = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.status != 0";
            $request = $this->selectAll($sql_categorias);
            return $request;
        }

        public function insertCategoria(string $titulo, string $img, string $icon, $fatherCategoria, int $status )
        {
            $return = "";
            $dataImg;
            $dataIcon;

            $this->strCategoria = $titulo;
            $this->strImg = $img;
            $this->strIcon = $icon;
            $this->intCategoria = $fatherCategoria;
            $this->intStatus = $status;

            $this->strImg == 'NULL' ? $dataImg = $this->strImg: $dataImg = "'$this->strImg'";

            $this->strIcon == 'NULL' ? $dataIcon = $this->strIcon: $dataIcon = "'$this->strIcon'";

            if ($this->strIcon == "") {
                return "notIcon";
            }

            $sql_exists_categoria = "SELECT * FROM categorias WHERE nombre = '$this->strCategoria' AND categoria_father_id is null";

            $request = $this->selectAll($sql_exists_categoria);

            if(empty($request)){
                $sql_insert_categoria = "INSERT INTO categorias(nombre, imgCategoria, icono, categoria_father_id, status) VALUES('$this->strCategoria', $dataImg, $dataIcon, $this->intCategoria, $this->intStatus)";
                $request = $this->insert($sql_insert_categoria);
                $return = $request;
            }else{
                $return = "existe";
            }    
            
            return $return;
        }

        public function selectCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            
            $sql_select_categoria = "SELECT ca1.*, ca2.nombre AS fathercatname FROM categorias ca1 LEFT JOIN categorias ca2 ON ca1.categoria_father_id = ca2.idcategoria WHERE ca1.idcategoria = $this->intIdCategoria";
            $request = $this->select( $sql_select_categoria);
            return $request;
        }

        public function updateCategoria(int $idcategoria, string $titulo, string $img, string $icon, $fatherCategoria, int $status)
        {
            $dataImg;
            $dataIcon;

            $this->intIdCategoria = $idcategoria;
            $this->strCategoria = $titulo;
            $this->strImg = $img;
            $this->strIcon = $icon;
            $this->intCategoria = $fatherCategoria;
            $this->intStatus = $status;

            $this->strImg == 'NULL' ? $dataImg = $this->strImg: $dataImg = "'$this->strImg'";

            $this->strIcon == 'NULL' ? $dataIcon = $this->strIcon: $dataIcon = "'$this->strIcon'";

            if ($this->strIcon == "") {
                return "notIcon";
            }

            $sql_exists_categoria = "SELECT * FROM categorias WHERE nombre = '{$this-> strCategoria}' AND idcategoria != $this->intIdCategoria AND categoria_father_id is null";
            $request = $this->selectAll($sql_exists_categoria);

            if (empty($request)) {
                $sql_update_categoria = "UPDATE categorias SET nombre = '$this->strCategoria',  imgcategoria = $dataImg, icono  = $dataIcon, categoria_father_id = $this->intCategoria, status = $this->intStatus WHERE idcategoria = $this->intIdCategoria";
                $request = $this->update($sql_update_categoria);
                
                if ($request) {
                    $childrensIds = array();
                    $recursiveData = self::recursiveChildren($this->intIdCategoria, $childrensIds);
                    $arrImplode = implode(',', $recursiveData);
                    $update_status = "UPDATE categorias set status = $this->intStatus WHERE idcategoria in ($arrImplode)";
                    $this->update($update_status);
                }
            }else{
                $request = 'existe';
            }
            return $request;
        }

        public function recursiveChildren($idFather, &$arrayIds)
        {
            $sql = "SELECT idcategoria FROM categorias WHERE categoria_father_id = $idFather";
            $request = $this->selectAll($sql);
            foreach ($request as $key => $value) {
                $idData = $value['idcategoria'];
                $arrayIds[] = $idData;
                self::recursiveChildren($idData, $arrayIds);
            }
            return $arrayIds;
        }

        public function deleteCategoria(int $idcategoria)
        {
            $this->intIdCategoria = $idcategoria;
            $sql_exists_productos = "SELECT * FROM productos WHERE categoriaid = $this->intIdCategoria";
            $request = $this->selectAll($sql_exists_productos);
            

            if (empty($request)) {
                $sql_update_status_categoria = "UPDATE categorias SET status = 0 WHERE idcategoria = $this->intIdCategoria";
                
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

        public function menuCategorias()
        {
            $sql = "SELECT * FROM categorias WHERE status = 1";
            return $this->selectAll($sql);
        }
    }
    
?>
