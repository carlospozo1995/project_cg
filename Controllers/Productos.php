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
                $catFatherName = "";
                !empty($idProducto) ? $intIdProducto = intval($idProducto) : "";
                $arrCategorias = $this->model->ctgProductos($intIdProducto);
                
                foreach ($arrCategorias as $key => $value) {
                    $value['fathercatname'] != "" ? $catFatherName = ' ('.$value['fathercatname'].')' : $catFatherName = "";

                    if ($value['status'] == 1) {
                        $htmlOptions .= '<option value="'.$value['idcategoria'].'">'.$value['nombre'].$catFatherName.'</option>';
                    }
                }
                echo $htmlOptions;
            }
        }

        public function setProductos()
        {
            // dep($_POST);
            // exit;
            if($_POST){
                if($_POST['txtNombre'] == "" || $_POST['txtDescripcion'] == "" || $_POST['txtCodigo'] == "" || $_POST['txtPrecio'] == "" || $_POST['listCategorias'] == "" || $_POST['listStatus'] == ""){
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdProducto = intval($_POST['idProducto']);
                    $strNombre = $_POST['txtNombre'];
                    $strDescripcion  = $_POST['txtDescripcion'];
                    $intCodigo = intval($_POST['txtCodigo']);
                    $strPrecio = strClean($_POST['txtPrecio']);
                    $listCategoria = intval($_POST['listCategorias']);
                    $listStatus = intval($_POST['listStatus']);
                    $request_producto = "";

                    if (empty($intProducto)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            $request_producto = $this->model->insertProducto($strNombre, $strDescripcion, $intCodigo, $strPrecio, $listCategoria, $listStatus);
                        }
                    }

                }
            }
        }

    }   

?>