<?php

    
    class Categorias extends Controller {
            
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }
            getPermisos(5);
        }

        public function categorias()
        {   
            if(empty($_SESSION['permisos'][5]['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Categorias';
            $data['page_title'] = 'Empresa - Categorias';
            // $data['page_title'] = 'Créditos GUAMAN - Categorias';
            $data['page_name'] = 'Categorias';
            $data['page_functions_js'] = 'functions_categorias.js';
            $this->views->getView($this, "categorias", $data);
        }

        public function setCategoria()
        {
            if ($_POST) {
                if ($_POST['txtNombre'] == '' || $_POST['txtDescripcion'] == '' || $_POST['listStatus'] == '') {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdCategory = intval($_POST['idCategory']);
                    $strCategory = strClean($_POST['txtNombre']);
                    $strDescripcion = strClean($_POST['txtDescripcion']);
                    $intStatus = intval($_POST['listStatus']);
                    $request_category = "";
                    
                    $foto = $_FILES['foto'];
                    $name_foto = $foto['name'];
                    $type = $foto['type'];
                    $url_temp = $foto['tmp_name'];
                    $imgPortada = 'imgCategory.png';

                    if (!empty($name_foto)) {
                        $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                        // dep($imgPortada);
                    }
                    
                    if (empty($intIdCategory)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            $request_category = $this->model->insertCategory($strCategory, $strDescripcion, $imgPortada, $intStatus);
                            if ($name_foto != '') {uploadImage($foto, $imgPortada);}
                        }
                    }
                    // else{
                        // $option=2;
                        // if($_SESSION['permisosMod']['actualizar']){
                        //     $request_category = $this->model->updateCategory($intIdCategory, $strCategory, $strDescripcion, $intStatus, $imgPortada);
                        // }
                    // }
        
                    if ($request_category > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                        }
                        // else{
                        //     $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        // }
                    }else if($request_category == "existe"){
                        $arrResponse = array('status' => false, 'msg' => 'La categoria a ingresar ya existe.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No se ha podido ingresar los datos.');
                    }  
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
        }

        public function getCategorias()
        {   
            if($_SESSION['permisosMod']['ver']){
                $arrCategorias = $this->model->selectCategorias();

                for ($i=0; $i < count($arrCategorias); $i++) { 
                    $btnViewCategory = '';
                    $btnUpdateCategory = '';
                    $btnDeleteCategory = '';

                    if ($_SESSION['permisosMod']['ver']) {
                        $btnViewCategory = '<button type="button" class=" btnViewCategory btn btn-secondary btn-sm" onclick="viewCategoria('.$arrCategorias[$i]['idcategoria'].')" tilte="Ver"><i class="fas fa-key"></i></button>';
                    }
                    if (!empty($_SESSION['permisosMod']['actualizar']) && $_SESSION['idUser'] == 1) {
                        $btnUpdateCategory = '<button type="button" class="btnEditCategoria btn btn-primary btn-sm" onclick="editCateoria('.$arrCategorias[$i]['idcategoria'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                    }
                    if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                        $btnDeleteCategory = ' <button type="button" class="btnDeleteCategory btn btn-danger btn-sm" onclick="deleteCategoria('.$arrCategorias[$i]['idcategoria'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                    }

                    if ($arrCategorias[$i]['status'] == 1) {
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                    }else{
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                    }

                    // BTN PERMISOS DELETE EDIT
                    $arrCategorias[$i]['actions']=   '<div class="text-center">'.$btnViewCategory.' '.$btnUpdateCategory.' '.$btnDeleteCategory.'</div>' ;
                }
                echo json_encode($arrCategorias, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }   

?>