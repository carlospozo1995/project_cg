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

                    $image = $_FILES['imagen'];
                    $name_image = $image['name'];
                    $imgBackup = 'imgCategoria.png';

                    $icon = $_FILES['icono'];
                    $name_icon = $icon['name'];   
                    $iconBackup = ""; 

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
                                    uploadImage($icon, $iconBackup);
                                }

                                if (!empty($name_image)) {
                                    $imgBackup = 'img_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                    uploadImage($image, $imgBackup);
                                }
                            }

                            $request_categoria = $this->model->insertCategoria($strCategoria, $imgBackup, $iconBackup, $intListCtg, $intStatus );
                            
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
                                    uploadImage($image, $imgBackup);   
                                }

                                if($name_icon == ""){
                                    if ($_POST['icon_actual'] != "" && $_POST['icon_remove'] == 0) {
                                        $iconBackup = $_POST['icon_actual'];
                                    }
                                }else{
                                    $iconBackup = 'icono_'.$strNotSpace.'_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                    uploadImage($icon, $iconBackup); 
                                }
                            }

                            $request_categoria = $this->model->updateCategoria($intIdCategoria, $strCategoria, $imgBackup, $iconBackup, $intListCtg, $intStatus);
                        }
                    }

                    if ($request_categoria > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.', 'idCtg' => $request_categoria, 'permisos' => $_SESSION['permisosMod'], 'idUser'=> $_SESSION['idUser']);
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        }
                    }else if($request_categoria == "notIcon"){
                        $arrResponse = array('status' => false, 'msg' => 'Ingrese un icono.');
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