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
            $sql ="SELECT * FROM categorias ca where ca.idcategoria not in (select c.categoria_father_id from categorias c where c.categoria_father_id is not null)";
            $request = $this->selectAll($sql);
            return $request;
        }

}
?>