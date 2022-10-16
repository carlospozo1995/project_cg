<?php

	class Clientes extends Controller {
        
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(6);
        }

        public function clientes()
        {
            if(empty($_SESSION['permisosMod']['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Clientes';
            // $data['page_title'] = 'Créditos GUAMAN - Clientes';
            $data['page_name'] = 'Clientes';
            $data['page_functions_js'] = 'functions_clientes.js';
            $this->views->getView($this, "clientes", $data);
        }


        public function setCliente()
        {
            if ($_POST) {
                if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtTelefono'])) {
                    $arrResponse = array("status" => false, "msg" => "Datos incorrectos.");
                }else{
                    $intIdCliente= intval($_POST['idCliente']);
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strClean($_POST['txtEmail']);
                    $strPassword =  hash("SHA256", $_POST['txtPassword']);
                    $intRoluser = 5;
                    $request_cliente = "";
                    if (empty($intIdCliente)) {
                        // CLIENTE CREATE
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);

                        if($_SESSION['permisosMod']['crear']){
                            $request_cliente = $this->model->insertCliente($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $strPassword);
                        }
                    }else{
                        // UPDATE CLIENTE
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? '' : hash("SHA256", $_POST['txtPassword']);
                        if($_SESSION['permisosMod']['actualizar']){
                            $request_cliente = $this->model->updateCliente($intIdCliente, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $strPassword);
                        }
                    }

                    if ($request_cliente > 0) {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.", "permisosMod" => $_SESSION['permisosMod'], "idData" => $request_cliente, "userId" => $_SESSION['idUser']);

                        }else{
                            $arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente.");
                        }
                    }else if ($request_cliente == "Existe correo e identificacion"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! La identificación y el correo ya existen. Intentelo de nuevo por favor.");
                    }else if ($request_cliente == "Existe identificacion"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! La identificación ya existe. Intentelo de nuevo por favor.");
                    }else if ($request_cliente == "Existe correo"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! El email ya existe. Intentelo de nuevo por favor.");
                    }else{
                        $arrResponse = array("status" => false, "msg" => "No es posible ingresar los datos.");
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        
    }

?>