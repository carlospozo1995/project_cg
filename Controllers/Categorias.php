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
            // dep($_POST);
            // dep($_FILES);
            if ($_POST) {
                if($_POST['txtTitulo'] == "" || $_POST['listStatus'] == ""){
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdCategoria = intval($_POST['idCategoria']);
                    $strCategoria = strClean(ucwords($_POST['txtTitulo']));
                    $fatherCategoria = $_POST['fatherId'] != "" ? $_POST['fatherId'] : "NULL";
                    $intStatus = intval($_POST['listStatus']);
                    $request_categoria = "";

                    $foto = $_FILES['foto'];
                    $name_foto = $foto['name'];
                    $type = $foto['type'];
                    $url_temp = $foto['tmp_name'];
                    $imgPortada = 'imgCategoria.png';

                    if (!empty($name_foto)) {
                        $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                    }

                    if (empty($intIdCategoria)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            $request_categoria = $this->model->insertCategoria($strCategoria, $fatherCategoria, $intStatus, $imgPortada);
                            if ($name_foto != '') {uploadImage($foto, $imgPortada);}
                        }
                    }

                    // dep($intIdCategoria);
                    // dep($strCategoria);
                    // dep($fatherCategoria);
                    // dep($intStatus);
                    // dep($foto);
                }
            }
        }
    }