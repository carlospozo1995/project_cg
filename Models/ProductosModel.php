<?php

    class ProductosModel extends Mysql{

        public $intIdProducto;
        public $strNombre;
        public $strDescripcion;
        public $strMarca;
        public $intCodigo;
        public $intStock;
        public $strPrecio;
        public $intCategoria;
        public $intStatus;

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

            $sql ="SELECT ca.*, ca2.nombre AS fathercatname FROM categorias ca LEFT JOIN categorias ca2 ON ca.categoria_father_id = ca2.idcategoria where ca.idcategoria not in (select c.categoria_father_id from categorias c where c.categoria_father_id is not null AND c.status = 1 ORDER BY c.nombre ASC) AND ca.status = 1 ORDER BY ca.nombre ASC";
            $request = $this->selectAll($sql);
            return $request;
        }

        public function insertProducto(string $nombre, string $descripcion, string $marca, int $codigo, int $stock ,string $precio, int $categoria, int $status)
        {
            $return = "";
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strMarca = $marca;
            $this->intCodigo = $codigo;
            $this->intStock = $stock;
            $this->strPrecio = $precio;
            $this->intCategoria = $categoria;
            $this->intStatus = $status;

            $sql_exist_codigo = "SELECT * FROM project_cg.productos WHERE codproducto = $this->intCodigo";

            $request = $this->selectAll($sql_exist_codigo);
            if(empty($request)){
                $sql_insert_producto = "INSERT INTO project_cg.productos (categoriaid, codproducto, nombre, descripcion, marca, precio, stock, status) VALUES($this->intCategoria, $this->intCodigo, '$this->strNombre', '$this->strDescripcion', '$this->strMarca', '$this->strPrecio', $this->intStock, $this->intStatus)";
                $request = $this->insert($sql_insert_producto);
                $return = $request;
            }else{
                $return = 'existe';
            }
            return $return;
        }

        public function allProductos()
        {
            $sql_productos = "SELECT  p.*, c.nombre AS categoria FROM project_cg.productos p INNER JOIN project_cg.categorias c ON p.categoriaid = c.idcategoria WHERE p.status != 0";
            $request = $this->selectAll($sql_productos);
            return $request;
        }

    }
?>