<?php

    class ProductosModel extends Mysql{

        public $intIdProducto;
        public $strNombre;
        public $strDescPcp;
        public $strDescGrl;
        public $strMarca;
        public $intCodigo;
        public $intStock;
        public $strPrecio;
        public $intCategoria;
        public $intStatus;
        public $strImagen;
        public $strSliderDst;
        public $strSliderMbl;

        function __construct(){
            parent::__construct();
        }

        public function ctgProductos()
        {   
            $sql ="SELECT ca.*, ca2.nombre AS fathercatname FROM categorias ca LEFT JOIN categorias ca2 ON ca.categoria_father_id = ca2.idcategoria where ca.idcategoria not in (select c.categoria_father_id from categorias c where c.categoria_father_id is not null AND c.status = 1 ORDER BY c.nombre ASC) AND ca.status = 1 ORDER BY ca.nombre ASC";

            $request = $this->selectAll($sql);
            return $request;
        }

        public function insertProducto(string $nombre, string $descPcp, $descGrl, string $sliderDst, string $sliderMbl, string $marca, int $codigo, int $stock ,string $precio, int $categoria, int $status)
        {
            $return = "";
            $dataSliderDst;
            $dataSliderMbl;

            $this->strNombre = $nombre;
            $this->strDescPcp = $descPcp;
            $this->strDescGrl = $descGrl;
            $this->strMarca = $marca;
            $this->intCodigo = $codigo;
            $this->intStock = $stock;
            $this->strPrecio = $precio;
            $this->intCategoria = $categoria;
            $this->intStatus = $status;
            $this->strSliderDst = $sliderDst;
            $this->strSliderMbl = $sliderMbl;

            $dataChange_dg = ""; 

            $this->strDescGrl != "NULL" ? $dataChange_dg = "'$this->strDescGrl'" : $dataChange_dg = $this->strDescGrl; 

            if (($this->strSliderDst == 'NULL' && $this->strSliderMbl != 'NULL') || ($this->strSliderDst != 'NULL' && $this->strSliderMbl == 'NULL')) {
                return "bothFull";
            }

            if ($this->strSliderDst == 'NULL' && $this->strSliderMbl == 'NULL') {
                $dataSliderDst = $this->strSliderDst;
                $dataSliderMbl = $this->strSliderMbl;
            }else{
                $dataSliderDst = "'$this->strSliderDst'";
                $dataSliderMbl = "'$this->strSliderMbl'";
            }

            $sql_exist_codigo = "SELECT * FROM productos WHERE codproducto = $this->intCodigo";

            $request = $this->selectAll($sql_exist_codigo);
            if(empty($request)){
                $sql_insert_producto = "INSERT INTO productos(categoriaid, codproducto, nombre, descprincipal, descgeneral, sliderDesktop, sliderMobile, marca, precio, stock, status) VALUES($this->intCategoria, $this->intCodigo, '$this->strNombre', '$this->strDescPcp' ,$dataChange_dg , $dataSliderDst, $dataSliderMbl, '$this->strMarca', '$this->strPrecio', $this->intStock, $this->intStatus)";
                $request = $this->insert($sql_insert_producto);
                $return = $request;
            }else{
                $return = 'existe';
            }
            return $return;
        }

        public function updateProducto(int $idProducto, string $nombre, string $descPcp, $descGrl, string $sliderDst, string $sliderMbl, string $marca, int $codigo, int $stock ,string $precio, int $categoria, int $status)
        {
            $dataSliderDst;
            $dataSliderMbl;

            $this->intIdProducto = $idProducto;
            $this->strNombre = $nombre;
            $this->strDescPcp = $descPcp;
            $this->strDescGrl = $descGrl;
            $this->strMarca = $marca;
            $this->intCodigo = $codigo;
            $this->intStock = $stock;
            $this->strPrecio = $precio;
            $this->intCategoria = $categoria;
            $this->intStatus = $status;
            $this->strSliderDst = $sliderDst;
            $this->strSliderMbl = $sliderMbl;

            $dataChange_dg = ""; 
            $this->strDescGrl != "NULL" ? $dataChange_dg = "'$this->strDescGrl'" : $dataChange_dg = $this->strDescGrl; 

            if (($this->strSliderDst == 'NULL' && $this->strSliderMbl != 'NULL') || ($this->strSliderDst != 'NULL' && $this->strSliderMbl == 'NULL')) {
                return "bothFull";
            }

            if ($this->strSliderDst == 'NULL' && $this->strSliderMbl == 'NULL') {
                $dataSliderDst = $this->strSliderDst;
                $dataSliderMbl = $this->strSliderMbl;
            }else{
                $dataSliderDst = "'$this->strSliderDst'";
                $dataSliderMbl = "'$this->strSliderMbl'";
            }

            $sql_exists_codigo = "SELECT * FROM productos WHERE codproducto = $this->intCodigo AND idproducto != $this->intIdProducto";
            $request = $this->selectAll($sql_exists_codigo);

            if (empty($request)) {
                $sql_update_producto = "UPDATE productos SET categoriaid = $this->intCategoria, codproducto = $this->intCodigo, nombre = '$this->strNombre', descprincipal = '$this->strDescPcp', descgeneral = $dataChange_dg, sliderDesktop = $dataSliderDst, sliderMobile = $dataSliderMbl, marca = '$this->strMarca', precio = '$this->strPrecio', stock = $this->intStock, status = $this->intStatus WHERE idproducto = $this->intIdProducto";
                $request = $this->update($sql_update_producto);
            }else{
                $request = 'existe';
            }
            return $request;
        }

        public function allProductos()
        {
            $sql_productos = "SELECT  p.*, c.nombre AS categoria FROM productos p INNER JOIN categorias c ON p.categoriaid = c.idcategoria WHERE p.status != 0";
            $request = $this->selectAll($sql_productos);
            return $request;
        }

        public function insertImage(int $idProducto, string $nameImgProd)
        {
            $this->intIdProducto = $idProducto;
            $this->strImagen = $nameImgProd;
            $sql_insert_img = "INSERT INTO imgproductos(productoid, imagen) VALUES($this->intIdProducto, '$this->strImagen')";
            $request = $this->insert($sql_insert_img);
            return $request;
        }

        public function selectProducto(int $idProducto)
        {
            $this->intIdProducto = $idProducto;
            $sql_select_producto = "SELECT p.*, c.nombre AS nameCtg FROM productos p INNER JOIN categorias c ON p.categoriaid = c.idcategoria where p.idproducto = $this->intIdProducto"; 
            $request = $this->select($sql_select_producto);
            return $request;
        }

        public function selectImages(int $idProducto)
        {
            $this->intIdProducto = $idProducto;
            $sql_selec_imgProd = "SELECT * FROM imgproductos WHERE productoid = $this->intIdProducto";
            $request = $this->selectAll($sql_selec_imgProd);
            return $request;
        }

        public function deleteImage(int $idProducto, string $imgName)
        {
            $this->intIdProducto = $idProducto;
            $this->strImagen = $imgName;

            $query = "DELETE FROM imgproductos WHERE productoid = $this->intIdProducto AND imagen = '$this->strImagen'";
            $request_delete = $this->delete($query);
            return $request_delete;
        }

        public function deleteProducto(int $idProducto)
        {
            $this->intIdProducto = $idProducto;
            $sql_delete = "UPDATE productos SET status = 0 WHERE idproducto = $this->intIdProducto";
            return $this->update($sql_delete);
        }
    }
?>