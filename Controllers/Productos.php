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

        public function getCategorias()
        {
            if ($_SESSION['permisosMod']['ver']) {
                $htmlOptions = "";
                "";
                $catFatherName = "";
                // !empty($idProducto) ? $intIdProducto = intval($idProducto) :  $intIdProducto = "";
                $arrCategorias = $this->model->ctgProductos();
                
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
            if($_POST){
                if($_POST['txtNombre'] == "" || $_POST['txtDescPcp'] == "" || $_POST['txtMarca'] == "" || $_POST['txtCodigo'] == "" || $_POST['txtStock'] == "" || $_POST['txtPrecio'] == "" || $_POST['listCategorias'] == "" || $_POST['listStatus'] == ""){
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdProducto = intval($_POST['idProducto']);
                    $strNombre = strClean($_POST['txtNombre']);
                    $strDescPcp = strClean($_POST['txtDescPcp']);
                    $strDescGrl = $_POST['txtDescGrl'] != "" ? strClean($_POST['txtDescGrl']) : 'NULL';
                    $strMarca  = strClean($_POST['txtMarca']);                    
                    $intCodigo = intval($_POST['txtCodigo']);
                    $intStock = intval($_POST['txtStock']);
                    $strPrecio = strClean($_POST['txtPrecio']);
                    $listCategoria = intval($_POST['listCategorias']);
                    $listStatus = intval($_POST['listStatus']);
                    $request_producto = "";

                    if (empty($intProducto)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            $request_producto = $this->model->insertProducto($strNombre, $strDescPcp, $strDescGrl, $strMarca, $intCodigo, $intStock, $strPrecio, $listCategoria, $listStatus);
                        }
                    }

                    if ($request_producto > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'idproducto' => $request_producto, 'msg' => 'Datos ingresados correctamente.', 'permisos' => $_SESSION['permisosMod'], 'idUser'=> $_SESSION['idUser'], 'price' =>  SMONEY.' '.formatMoney($strPrecio));
                        }
                        // else{
                        //     $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        // }
                    }else if($request_producto == "existe"){
                        $arrResponse = array('status' => false, 'msg' => 'El codigo del producto a ingresar ya existe.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No se ha podido ingresar los datos.');
                    }  
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
        }

        public function setImage()
        {
            if ($_POST) {
                if(empty($_POST['idProducto'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de carga');
                }else{
                    $idProducto = intval($_POST['idProducto']);
                    $foto = $_FILES['foto'];
                    $imgNameProd = 'prod_'.md5(date('d-m-Y H:m:s')).'.jpg';
                    $request_image = $this->model->insertImage($idProducto, $imgNameProd);
                    if ($request_image) {
                        uploadImage($foto, $imgNameProd);
                        $arrResponse = array('status' => true, 'imgname' => $imgNameProd, 'msg' => 'Archivo cargado');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error de carga');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die;
            }
        }

        public function getProducto($idProducto)
        {
            if($_SESSION['permisosMod']['ver']){
                $intIdProducto = intval($idProducto);
                if ($intIdProducto > 0) {
                    $arrDataProd = $this->model->selectProducto($intIdProducto);
                    if (empty($arrDataProd)) {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrImgProd = $this->model->selectImages($intIdProducto);
                        if (count($arrImgProd) > 0) {
                            for ($i=0; $i < count($arrImgProd); $i++) { 
                                $arrImgProd[$i]['url_image'] = media().'images/uploads/'.$arrImgProd[$i]['imagen'];
                            }
                        }
                        $arrDataProd['imagesProd'] = $arrImgProd;
                        $arrResponse = array('status' => true, 'data' => $arrDataProd);
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    die();
                }
            }
        }

    }   

?>