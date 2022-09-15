<?php

    
    class Productos extends Controller {
            
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }
            getPermisos(4);
        }

        public function productos()
        {
            if(empty($_SESSION['permisos'][4]['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Productos';
            $data['page_title'] = 'Empresa - Productos';
            // $data['page_title'] = 'Créditos GUAMAN - Productos';
            $data['page_name'] = 'Productos';
            $data['page_functions_js'] = 'functions_productos.js';
            $this->views->getView($this, "productos", $data);
        }

        public function getCategorias($idProducto)
        {
            if ($_SESSION['permisosMod']['ver']) {
                $htmlOptions = "";
                $intIdProducto = "";
                !empty($idProducto) ? $intIdProducto = intval($idProducto) : "";
                $arrCategorias = $this->model->ctgProductos($intIdProducto);
                dep($arrCategorias);
            }
        }

























        // public function subCatProductos ($idCategoria, $arrCategorias, $valueCatP)
        // {
        //     // dep($valueCatP);
        //     $catFather = "";
        //     $return ="";
        //     foreach ($arrCategorias as $key => $value) {
        //         if ($value['categoria_father_id'] == $idCategoria) {
        //             // $return .= '<option value="'.$value['idcategoria'].'">'.$value['nombre'].'</option>';
        //             // self::subsubProductos($value['idcategoria'], $arrCategorias);
        //         }else{

        //         }
        //     }
        // }

        // // public function subsubProductos($idCategoria, $arrCategorias)
        // // {
        // //     foreach ($arrCategorias as $key => $value) {
        // //         if ($value['status'] == 1 && $value['categoria_father_id'] == $idCategoria) {
        // //             // $return .= '<option value="'.$value['idcategoria'].'">'.$value['nombre'].'</option>';
        // //             dep($value);
        // //         }
        // //     }
        // // }

        

    }   

?>