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
            if(empty($_SESSION['permisosMod']['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Productos';
            $data['page_title'] = 'Empresa - Productos';
            // $data['page_title'] = 'Créditos GUAMAN - Productos';
            $data['page_name'] = 'Productos';
            $data['page_functions_js'] = 'functions_productos.js';
            $this->views->getView($this, "productos", $data);
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

                    $sliderDst = $_FILES['sliderDst'];
                    $name_slrDst = $sliderDst['name'];
                    $slrDstBackup = ""; 

                    $sliderMbl = $_FILES['sliderMbl'];
                    $name_slrMbl = $sliderMbl['name'];
                    $slrMblBackup = ""; 

                    $strNotSpace = str_replace(' ', '-', $strNombre);

                    if (empty($intIdProducto)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){

                            if (!empty($name_slrDst)) {
                                $slrDstBackup = 'sliderDesktop_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                            }else{
                                $slrDstBackup = 'NULL';
                            }

                            if (!empty($name_slrMbl)) {
                                $slrMblBackup = 'sliderMobile_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                            }else{
                                $slrMblBackup = 'NULL';
                            }

                            $request_producto = $this->model->insertProducto($strNombre, $strDescPcp, $strDescGrl, $slrDstBackup , $slrMblBackup, $strMarca, $intCodigo, $intStock, $strPrecio, $listCategoria, $listStatus);
                        }
                    }else{
                        $option = 2;
                        if ($_SESSION['permisosMod']['actualizar']) {
                            if(!empty($name_slrDst)) {
                                if (!empty($_POST['sliderDst_actual']) || empty($_POST['sliderDst_actual'])) {
                                    $slrDstBackup = 'sliderDesktop_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                            }else{
                                if (!empty($_POST['sliderDst_actual'])) {
                                    $slrDstBackup = $_POST['sliderDst_actual'];
                                }else{
                                    $slrDstBackup = 'NULL';   
                                }
                            }

                            if (!empty($name_slrMbl)) {
                                if (!empty($_POST['sliderMbl_actual']) || empty($_POST['sliderMbl_actual'])) {
                                    $slrMblBackup = 'sliderMobile_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                            }else{
                                if (!empty($_POST['sliderMbl_actual'])) {
                                    $slrMblBackup = $_POST['sliderMbl_actual'];
                                }else{
                                    $slrMblBackup = 'NULL';   
                                }
                            }

                            $request_producto = $this->model->updateProducto($intIdProducto, $strNombre, $strDescPcp, $strDescGrl, $slrDstBackup , $slrMblBackup, $strMarca, $intCodigo, $intStock, $strPrecio, $listCategoria, $listStatus);
                        }   
                    }

                    if ($request_producto > 0) {
                        $dataDesktop;
                        $dataMobile;

                        $slrDstBackup != 'NULL' ? $dataDesktop = media().'images/uploadsProduct/'.$slrDstBackup : $dataDesktop = "";
                        $slrMblBackup != 'NULL' ? $dataMobile = media().'images/uploadsProduct/'.$slrMblBackup : $dataMobile = "";

                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'idproducto' => $request_producto, 'msg' => 'Datos ingresados correctamente.', 'permisos' => $_SESSION['permisosMod'], 'idUser'=> $_SESSION['idUser'], 'price' =>  SMONEY.' '.formatMoney($strPrecio), 'sliderDesktop' => $dataDesktop, 'sliderMobile' => $dataMobile);
                            uploadImgProd($sliderDst, $slrDstBackup);
                            uploadImgProd($sliderMbl, $slrMblBackup);
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.', 'priceUpdate' =>  SMONEY.' '.formatMoney($strPrecio), 'sliderDesktop' => $dataDesktop, 'sliderMobile' => $dataMobile);
                            uploadImgProd($sliderDst, $slrDstBackup);
                            uploadImgProd($sliderMbl, $slrMblBackup);
                        }
                    }else if($request_producto == "bothFull"){
                        $arrResponse = array('status' => false, 'msg' => 'Si quiere ingresar sliders. Debe ingresar ambos(Desktop-Mobile).');
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
                    $imgNameProd = 'productoRef_'.$idProducto.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                    $request_image = $this->model->insertImage($idProducto, $imgNameProd);
                    if ($request_image) {
                        uploadImgProd($foto, $imgNameProd);
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
                                $arrImgProd[$i]['url_image'] = media().'images/uploadsProduct/'.$arrImgProd[$i]['imagen'];
                            }
                        }

                        if (!empty($arrDataProd['sliderDesktop']) && !empty($arrDataProd['sliderMobile'])) {
                            $arrDataProd['url_sliderDts'] = media().'images/uploadsProduct/'.$arrDataProd['sliderDesktop'];
                            $arrDataProd['url_sliderMbl'] = media().'images/uploadsProduct/'.$arrDataProd['sliderMobile'];
                        }

                        $arrDataProd['imagesProd'] = $arrImgProd;
                        $arrResponse = array('status' => true, 'data' => $arrDataProd);
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                    die();
                }
            }
        }

        public function delFile()
        {
            if ($_POST) {
                if (empty($_POST['idProducto']) || empty($_POST['file'])) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $idProducto = intval($_POST['idProducto']);
                    $imgName = strClean($_POST['file']);

                    $request_image = $this->model->deleteImage($idProducto, $imgName);
                    if ($request_image) {
                        deleteFile($imgName);
                        $arrResponse = array('status' => true, 'msg' => 'Archivo eliminado');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el archivo');
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        public function delProducto($idProducto)
        {
            if ($_SESSION['permisosMod']['eliminar']) {
                $UpStatusProd = $this->model->deleteProducto($idProducto);
                if ($UpStatusProd) {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto.');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }

    }   

?>