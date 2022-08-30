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

                    if ($request_categoria > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                        }
                        // else{
                        //     $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        // }
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
                            $htmlOptions .= subcategorias($arrCategorias[$i]['idcategoria'],1);
                        }
                    }
                }
                echo $optionStatic . $htmlOptions;
            }    
            die();
        }

        public function tableCategorias()
        {
            if($_SESSION['permisosMod']['ver']){
                $arrCategorias = $this->model->allCategorias();
                for ($i=0; $i < count($arrCategorias); $i++) { 
                                // if (!empty($arrCategorias[$i]['categoria_father_id'])) {
                                //     $arrCategorias[$i]['categoria_father_id'] = $arrCategorias[$i]['nombre'];
                                // }
            
                    if ($arrCategorias[$i]['status'] == 1) {
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                    }else{
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                    }
                }
            }
            echo json_encode($arrCategorias);
        }


        // public function tableCategorias()
        // {
        //     if($_SESSION['permisosMod']['ver']){
        //         $arrCategorias = $this->model->allCategorias();
        //         for ($i=0; $i < count($arrCategorias); $i++) { 
        //             // if (!empty($arrCategorias[$i]['categoria_father_id'])) {
        //             //     $arrCategorias[$i]['categoria_father_id'] = $arrCategorias[$i]['nombre'];
        //             // }

        //             if ($arrCategorias[$i]['status'] == 1) {
        //                 $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
        //             }else{
        //                 $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
        //             }
        //         }
        //     }
        //     echo json_encode($arrCategorias);
        // }
        
    }

?>