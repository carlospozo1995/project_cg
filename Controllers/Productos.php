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

        public function getCategorias($idProducto)
        {
            if ($_SESSION['permisosMod']['ver']) {
                $htmlOptions = "";
                $intIdProducto = "";
                $catFatherName = "";
                !empty($idProducto) ? $intIdProducto = intval($idProducto) : "";
                $arrCategorias = $this->model->ctgProductos($intIdProducto);
                
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
                if($_POST['txtNombre'] == "" || $_POST['txtDescripcion'] == "" || $_POST['txtMarca'] == "" || $_POST['txtCodigo'] == "" || $_POST['txtStock'] == "" || $_POST['txtPrecio'] == "" || $_POST['listCategorias'] == "" || $_POST['listStatus'] == ""){
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }else{
                    $intIdProducto = intval($_POST['idProducto']);
                    $strNombre = strClean($_POST['txtNombre']);
                    $strDescripcion  = strClean($_POST['txtDescripcion']);
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
                            $request_producto = $this->model->insertProducto($strNombre, $strDescripcion, $strMarca, $intCodigo, $intStock, $strPrecio, $listCategoria, $listStatus);
                        }
                    }

                    if ($request_producto > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'idproducto' => $request_producto, 'msg' => 'Datos ingresados correctamente.');
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

        public function tableProductos()
        {
            if($_SESSION['permisosMod']['ver']){
                $arrProductos = $this->model->allProductos();
                
                for ($i=0; $i < count($arrProductos); $i++) { 
                    $btnViewProducto = '';
                    $btnUpdateProducto = '';
                    $btnDeleteProducto = '';

                    $arrProductos[$i]['precio'] = SMONEY.' '.formatMoney($arrProductos[$i]['precio']);

                    if ($_SESSION['permisosMod']['ver']) {
                        $btnViewProducto = '<button type="button" class="btn btn-secondary btn-sm" onclick="viewProducto('.$arrProductos[$i]['idproducto'].')" tilte="Ver"><i class="fas fa-eye"></i></button>';
                    }

                    if (!empty($_SESSION['permisosMod']['actualizar'])) {
                        
                        $btnUpdateProducto = '<button type="button" class="btn btn-primary btn-sm" onclick="editProducto(this,'.$arrProductos[$i]['idproducto'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                    }

                    if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                        $btnDeleteProducto = ' <button type="button" class="btn btn-danger btn-sm" onclick="deleteProducto('.$arrProductos[$i]['idproducto'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                    }
            
                    if ($arrProductos[$i]['status'] == 1) {
                        $arrProductos[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                    }else{
                        $arrProductos[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                    }

                    $arrProductos[$i]['actions'] = '<div class="text-center">'.$btnViewProducto.' '.$btnUpdateProducto.' '.$btnDeleteProducto.'</div>';
                }
            }
            echo json_encode($arrProductos);
        }

    }   

?>