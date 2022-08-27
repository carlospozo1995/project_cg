<?php

    class CategoriasModel extends Mysql{
        public $intIdCategoria;
        public $strCategoria;
        public $intFatherCategoria;
        public $strImgPortada;
        public $intStatus;

        function __construct(){
            parent::__construct();
        }

        public function insertCategoria(string $titulo, $fatherCategoria, int $status, string $imgPortada){
            $return = "";
            $this->strCategoria = $titulo;
            $this->intFatherCategoria = $fatherCategoria;
            $this->intStatus = $status;
            $this->strImgPortada = $imgPortada;

            $sql_exists_categoria = "SELECT * FROM project_cg.categorias WHERE nombre = '$this->strCategoria'";

            $request = $this->selectAll($sql_exists_categoria);

            if(empty($request)){
                $sql_insert_categoria = "INSERT INTO project_cg.categorias(nombre, imgcategoria, categoria_father_id, status) VALUES('$this->strCategoria', '$this->strImgPortada', '$this->intFatherCategoria', $this->intStatus)";
                echo $sql_insert_categoria;
                $request = $this->insert($sql_insert_categoria);
                $return = $request;
            }else{
                $return = "existe";
            }
            return $return;
        }
    }

?>