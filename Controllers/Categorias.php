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
            dep($_POST);
            dep($_FILES);
            exit;
            $intIdrol = intval($_POST['idCategory']);
            $strCategory = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
            $request_category = "";

            if (empty($intIdrol)) {
                // ROL CREATE
                $option = 1;
                if($_SESSION['permisosMod']['crear']){
                    $request_category = $this->model->insertCategory($strCategory, $strDescripcion, $intStatus);
                }
            }else{
                $option=2;
                if($_SESSION['permisosMod']['actualizar']){
                    $request_category = $this->model->updateCategory($intIdrol, $strCategory, $strDescripcion, $intStatus);
                }
            }

            if ($request_category > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            }else if($request_category == "existe"){
                $arrResponse = array('status' => false, 'msg' => 'La categoria a ingresar ya existe.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'No se ha podido ingresar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }   

?>