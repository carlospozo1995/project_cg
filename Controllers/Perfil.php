<?php

    class Perfil extends Controller{
        public function __construct()
        {
            parent::__construct();
            
            session_start();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

        }

        public function perfil()
        {
            $data['page_tag'] = 'Perfil';
            $data['page_title'] = 'Empresa - Perfil';
            // $data['page_title'] = 'Créditos GUAMAN - Usuarios';
            $data['page_name'] = 'Perfil de usuario';
            $data['page_functions_js'] = 'functions_perfil.js';
            $this->views->getView($this, "perfil", $data);
        }

        public function updatePerfil()
        {   
            if($_POST){
                if ($_POST['identificacion'] == '' || $_POST['nombre'] == '' || $_POST['apellido'] == '' || $_POST['telefono'] == '') {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }
                else{
                    $idUser = $_SESSION['idUser'];
                    $identificacion = strClean($_POST['identificacion']);
                    $nombre = ucwords(strClean($_POST['nombre']));
                    $apellido = ucwords(strClean($_POST['apellido']));
                    $telefono = intval(strClean($_POST['telefono']));
                    $password  = "";

                    if(!empty($_POST['password'])){
                        $password = hash("SHA256", $_POST['password']);
                    }
                    $request = $this->model->updatePerfil($idUser, $identificacion, $nombre, $apellido, $telefono, $password);

                    if($request){
                        sessionUser($_SESSION['idUser']);
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
       
    }

?>