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
                if ($_POST['nombre'] == '' || $_POST['apellido'] == '' || $_POST['telefono'] == '' || $_POST['email'] == '') {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }
                else{
                    $idUser = $_SESSION['idUser'];
                    $nombre = ucwords(strClean($_POST['nombre']));
                    $apellido = ucwords(strClean($_POST['apellido']));
                    $telefono = intval(strClean($_POST['telefono']));
                    $email = strClean($_POST['email']);
                    $password  = "";

                    if(!empty($_POST['password'])){
                        $password = hash("SHA256", $_POST['password']);
                    }
                    $request = $this->model->updatePerfil($idUser, $nombre, $apellido, $telefono, $email, $password);

                    if($request == 1){
                        sessionUser($_SESSION['idUser']);
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                    }else if("existe"){
                        $arrResponse = array('status' => false, 'msg' => 'El email que desea actualizar ya lo tiene otro usuario. Intentelo de nuevo por favor.');
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