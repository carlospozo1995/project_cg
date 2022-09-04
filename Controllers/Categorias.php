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
                    $imgPortada = 'imgCategoria.png';

                    if (empty($intIdCategoria)) {
                        $option = 1;
                        if($_SESSION['permisosMod']['crear']){
                            if($intCategoria != 'NULL'){
                                // AGREGAR SUBCATEGORIA - SIN IMAGEN
                                $imgPortada = 'NULL';
                            }else{  
                                // AGREGAR CATEGORIA - CON IMAGEN
                                if (!empty($name_foto)) {
                                    $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                }
                                if ($name_foto != '') {uploadImage($foto, $imgPortada);}
                            }
                            $request_categoria = $this->model->insertCategoria($strCategoria, $imgPortada, $intCategoria, $intStatus );
                        }
                    }else{
                        $option = 2;
                        if($_SESSION['permisosMod']['actualizar']){
                            if($intCategoria != 'NULL'){
                                $imgPortada = 'NULL';
                            }else{
                                if($name_foto == ""){
                                    if (($_POST['foto_actual'] != 'imgCategoria.png' || $_POST['foto_actual'] != '') && $_POST['foto_remove'] == 0) {
                                        $imgPortada = $_POST['foto_actual'];
                                    }
                                    
                                    if($imgPortada == ""){
                                        $imgPortada = 'imgCategoria.png';
                                    }
                                }else{
                                    $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                                    uploadImage($foto, $imgPortada);   
                                }
                            }
                            $request_categoria = $this->model->updateCategoria($intIdCategoria, $strCategoria, $imgPortada, $intCategoria, $intStatus);
                        }
                    }

                    if ($request_categoria > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                        }
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

        // PINTAR CATEGORIAS EN UN SELECT
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
        // ---------------------------------

        public function tableCategorias()
        {
            if($_SESSION['permisosMod']['ver']){
                $arrCategorias = $this->model->allCategorias();
                for ($i=0; $i < count($arrCategorias); $i++) { 
                    $btnViewCategoria = '';
                    $btnUpdateCategoria = '';

                    $arrCategorias[$i]['categoria_father_id'] = $arrCategorias[$i]['fathercatname'];

                    if ($_SESSION['permisosMod']['ver']) {
                        $btnViewCategoria = '<button type="button" class=" btnViewCategory btn btn-secondary btn-sm" onclick="viewCategoria('.$arrCategorias[$i]['idcategoria'].')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                    }

                    if (!empty($_SESSION['permisosMod']['actualizar'])) {
                        
                        $btnUpdateCategoria = '<button type="button" class="btnEditCategoria btn btn-primary btn-sm" onclick="editCategoria(this,'.$arrCategorias[$i]['idcategoria'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                    }
            
                    if ($arrCategorias[$i]['status'] == 1) {
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                    }else{
                        $arrCategorias[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                    }

                    $arrCategorias[$i]['actions'] = '<div class="text-center">'.$btnViewCategoria.' '.$btnUpdateCategoria.'</div>';
                }
            }
            echo json_encode($arrCategorias);
        }

        public function viewCategoria($idCategoria)
        {
            if($_SESSION['permisosMod']['ver']){
                $intIdcategoria = intval($idCategoria);
                if ($intIdcategoria > 0) {
                    $arrCategoria = $this->model->selectCategoria($intIdcategoria);
                    if (empty($arrCategoria)) {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        if (!empty($arrCategoria['imgcategoria'])) {
                            $arrCategoria['url_imgcategoria'] = media().'images/uploads/'.$arrCategoria['imgcategoria'];    
                        }
                        $arrResponse = array('status' => true, 'data' => $arrCategoria);
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }
    }

?>