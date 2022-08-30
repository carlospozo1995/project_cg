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
                    $intCategoria = $_POST['listCategorias'] != "" ? intval($_POST['listCategorias']) :'NULL';
                    $intStatus = intval($_POST['listStatus']);
                    $request_categoria = "";

                    $foto = $_FILES['foto'];
                    $name_foto = $foto['name'];
                    $type = $foto['type'];
                    $url_temp = $foto['tmp_name'];

                    if (empty($intIdCategoria)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            if($intCategoria != 'NULL'){
                                // AGREGAR SUBCATEGORIA - SIN IMAGEN
                                $imgPortada = 'NULL';
                                $request_categoria = $this->model->insertCategoria($strCategoria, $imgPortada, $intCategoria, $intStatus );
                            }else{  
                                // ACTUALIZAR CATEGORIA - CON IMAGEN
                                $imgPortada = 'imgCategoria.png';

                                if (!empty($name_foto)) {
                                    $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                                $request_categoria = $this->model->insertCategoria($strCategoria, $imgPortada, $intCategoria, $intStatus );
                                if ($name_foto != '') {uploadImage($foto, $imgPortada);}
                            }
                        }
                    }
                }
            }
        }

        public function getCategorias()
        {
            if($_SESSION['permisosMod']['ver']){
                $htmlOptions = "";
                $arrCategorias = $this->model->selectCategorias();
                $optionStatic = '<option value="">-- CATEGORIA SUPERIOR --</option>';
                if (count($arrCategorias) > 0) {
                    for ($i=0; $i < count($arrCategorias); $i++) {

                        if ($arrCategorias[$i]['status'] == 1) {
                            $htmlOptions .= '<option value="'.$arrCategorias[$i]['idcategoria'].'">'.$arrCategorias[$i]['nombre'].'</option>' ;
                        }
                    }
                }
                echo $optionStatic . $htmlOptions;
            }    
            die();
        }
    }