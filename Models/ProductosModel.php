<?php

    class ProductosModel extends Mysql{

        public $intIdProducto;

        function __construct(){
            parent::__construct();
        }

        public function ctgProductos($idProducto)
            {   
                $this->intIdProducto = $idProducto;
                // $retutnId = "";
                // if (!empty($this->intCategoria)){
                //     $retutnId = " AND idcategoria != $this->intCategoria";
                // }

                // $sql = "SELECT * FROM project_cg.categorias WHERE status = 1";
                $sql ="SELECT ca.*, ca2.nombre AS fathercatname FROM categorias ca LEFT JOIN categorias ca2 ON ca.categoria_father_id = ca2.idcategoria where ca.idcategoria not in (select c.categoria_father_id from categorias c where c.categoria_father_id is not null AND c.status = 1) AND ca.status = 1";
                $request = $this->selectAll($sql);
                return $request;
            }

    }
?>