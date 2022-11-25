<?php
    class Categorias extends Controller{

        public function __construct() {
            sessionStart();
            parent::__construct();
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }
            getPermisos(5);
        }

        public function categorias()
        {
            if(empty($_SESSION['permisosMod']['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Categorias';
            $data['page_title'] = 'Empresa - Categorias';
            // $data['page_title'] = 'Créditos GUAMAN - Categorias';
            $data['page_name'] = 'Categorias';
            $data['page_functions_js'] = 'functions_categorias.js';
            $this->views->getView($this, "categorias", $data);
        }

        public function getCategorias($idCategoria)
        {
            if ($_SESSION['permisosMod']['ver']) {
                $intIdCategorias = "";
                !empty($idCategoria) ? $intIdCategorias = intval($idCategoria) : "";
                $arrCategorias = $this->model->sqlCategorias($intIdCategorias);
                addCategorias($arrCategorias);
            }
        }
    
        public function setCategoria()
        {   
            if($_POST){
                
                if($_POST['txtTitulo'] == "" || $_POST['listStatus'] == "" || $_POST['listCategorias'] == "") {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdCategoria = intval($_POST['idCategoria']);
                    $strCategoria = strClean($_POST['txtTitulo']);
                    $intListCtg = $_POST['listCategorias'] != 0 ? intval($_POST['listCategorias']) :'NULL';
                    $intStatus = intval($_POST['listStatus']);
                    $request_categoria = "";

                    $descSliderOne = $_POST['sliderDscOne'];
                    $bkDescSliderOne = "";

                    $descSliderTwo = $_POST['sliderDscTwo'];
                    $bkDescSliderTwo = "";

                    $image = $_FILES['imagen'];
                    $name_image = $image['name'];
                    $imgBackup = 'imgCategoria.png';

                    $icon = $_FILES['icono'];
                    $name_icon = $icon['name'];   
                    $iconBackup = ""; 

                    $sliderDst = $_FILES['sliderDst'];
                    $name_slrDst = $sliderDst['name'];
                    $slrDstBackup = ""; 

                    $sliderMbl = $_FILES['sliderMbl'];
                    $name_slrMbl = $sliderMbl['name'];
                    $slrMblBackup = ""; 

                    $strNotSpace = str_replace(' ', '-', $strCategoria);

                    if (empty($intIdCategoria)) {

                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){

                            if($intListCtg != 'NULL'){
                                // AGREGAR SUBCATEGORIA - SIN IMAGEN/SIN ICONO
                                $imgBackup = 'NULL';
                                $iconBackup = 'NULL';
                            }else{  
                                // AGREGAR CATEGORIA - CON IMAGEN-CON ICONO
                                if (!empty($name_icon)) {
                                    $iconBackup = 'icono_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }

                                if (!empty($name_image)) {
                                    $imgBackup = 'img_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                            }

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

                            if (!empty($name_slrDst) && !empty($name_slrMbl)) {
                                $descSliderOne != "" ? $bkDescSliderOne = $descSliderOne : $bkDescSliderOne = 'NULL';
                                $descSliderTwo != "" ? $bkDescSliderTwo = $descSliderTwo : $bkDescSliderTwo = 'NULL';
                            }else{
                                $bkDescSliderOne = 'NULL';
                                $bkDescSliderTwo = 'NULL';
                            }

                             $request_categoria = $this->model->insertCategoria($strCategoria, $imgBackup, $iconBackup, $slrDstBackup, $slrMblBackup, $bkDescSliderOne, $bkDescSliderTwo, $intListCtg, $intStatus);
                        }
                    }else{
                        $option = 2;
                        if($_SESSION['permisosMod']['actualizar']){
                            if($intListCtg != 'NULL'){
                                $imgBackup = 'NULL';
                                $iconBackup = 'NULL';
                            }else{
                                if($name_image == ""){
                                    if (($_POST['photo_actual'] != 'imgCategoria.png' || $_POST['photo_actual'] != '') && $_POST['photo_remove'] == 0) {
                                        $imgBackup = $_POST['photo_actual'];
                                    }
                                    
                                    if(($_POST['photo_remove'] == 1 && $_POST['photo_actual'] == 'imgCategoria.png') || ($_POST['photo_remove'] == 0 && $_POST['photo_actual'] == 'imgCategoria.png') || ($_POST['photo_remove'] == 0 && $_POST['photo_actual'] == '')){
                                        $imgBackup = 'imgCategoria.png';
                                    }
                                }else{
                                    $imgBackup = 'img_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }

                                if($name_icon == ""){
                                    if ($_POST['icon_actual'] != "" && $_POST['icon_remove'] == 0) {
                                        $iconBackup = $_POST['icon_actual'];
                                    }
                                }else{
                                    $iconBackup = 'icono_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                            }

                            if (!empty($name_slrDst)) {
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
                            
                            if ((!empty($_POST['sliderDst_actual']) && !empty($_POST['sliderMbl_actual'])) || (!empty($name_slrDst) && !empty($name_slrMbl))) {
                                $descSliderOne != "" ? $bkDescSliderOne = $descSliderOne : $bkDescSliderOne = 'NULL';
                                $descSliderTwo != "" ? $bkDescSliderTwo = $descSliderTwo : $bkDescSliderTwo = 'NULL';
                            }else{
                                $bkDescSliderOne = 'NULL';
                                $bkDescSliderTwo = 'NULL';
                            }

                            $request_categoria = $this->model->updateCategoria($intIdCategoria, $strCategoria, $imgBackup, $iconBackup, $slrDstBackup, $slrMblBackup, $bkDescSliderOne, $bkDescSliderTwo ,$intListCtg, $intStatus);
                        }
                    }

                    if ($request_categoria > 0) {
                        $dataDesktop;
                        $dataMobile;

                        $slrDstBackup != 'NULL' ? $dataDesktop = media().'images/uploads/'.$slrDstBackup : $dataDesktop = "";
                        $slrMblBackup != 'NULL' ? $dataMobile = media().'images/uploads/'.$slrMblBackup : $dataMobile = "";

                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.', 'idCtg' => $request_categoria, 'sliderDesktop' => $dataDesktop, 'sliderMobile' => $dataMobile, 'permisos' => $_SESSION['permisosMod'], 'idUser'=> $_SESSION['idUser']);
                            uploadImage($icon, $iconBackup);
                            uploadImage($image, $imgBackup);
                            uploadImage($sliderDst, $slrDstBackup);
                            uploadImage($sliderMbl, $slrMblBackup);
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.', 'sliderDesktop' => $dataDesktop, 'sliderMobile' => $dataMobile);
                            uploadImage($icon, $iconBackup);
                            uploadImage($image, $imgBackup);
                            uploadImage($sliderDst, $slrDstBackup);
                            uploadImage($sliderMbl, $slrMblBackup);
                        }
                    }else if($request_categoria == "notIcon"){
                        $arrResponse = array('status' => false, 'msg' => 'Ingrese un icono.');
                    }else if($request_categoria == "bothFull"){
                        $arrResponse = array('status' => false, 'msg' => 'Si quiere ingresar sliders. Debe ingresar ambos(Desktop-Mobile).');
                    }else if($request_categoria == "addSliderDesc"){
                        $arrResponse = array('status' => false, 'msg' => 'Si agrego sliders también debe llenar por lo menos el campo Slider descripcion 1.');
                    }else if($request_categoria == "existe"){
                        $arrResponse = array('status' => false, 'msg' => 'La categoria a ingresar ya existe.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No se ha podido ingresar los datos.');
                    }

                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
        }

        public function getCategoria($idCategoria)
        {
            if($_SESSION['permisosMod']['ver']){
                $intIdCategoria = intval($idCategoria);
                $arrCategorias = $this->model->sqlCategorias("");
                $dataChildren = childrensCategoria($arrCategorias, $intIdCategoria);

                if ($intIdCategoria > 0) {
                    $arrCategoria = $this->model->selectCategoria($intIdCategoria);
                    if (empty($arrCategoria)) {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{

                        if (!empty($arrCategoria['imgcategoria']) && !empty($arrCategoria['icono'])) {
                            $arrCategoria['url_imgcategoria'] = media().'images/uploads/'.$arrCategoria['imgcategoria'];
                            $arrCategoria['url_icono'] = media().'images/uploads/'.$arrCategoria['icono']; 
                        }

                        if (!empty($arrCategoria['sliderDesktop']) && !empty($arrCategoria['sliderMobile'])) {
                            $arrCategoria['url_sliderDts'] = media().'images/uploads/'.$arrCategoria['sliderDesktop'];
                            $arrCategoria['url_sliderMbl'] = media().'images/uploads/'.$arrCategoria['sliderMobile'];
                        }

                        $arrResponse = array('status' => true, 'data' => $arrCategoria, 'children' => $dataChildren);
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }

        public function delCategoria($idCategoria)
        {
            $request_categoria = "";
            $intCategoria = intval($idCategoria);
            if($_SESSION['permisosMod']['eliminar']){
                $arrCategorias = $this->model->sqlCategorias("");
                $dataChildren = childrensCategoria($arrCategorias, $intCategoria);
                !empty($dataChildren) ? $request_categoria = "categoryExist" : $request_categoria = $this->model->deleteCategoria($intCategoria);
            }

            if($request_categoria == "ok"){
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la categoria.');
            }elseif ($request_categoria == "categoryExist") {
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una categoria que contiene subcategorias.');
            }elseif($request_categoria == "productExist"){
                $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar una categoria que contiene productos.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la categoria.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
        
?>