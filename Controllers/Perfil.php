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

        public function updateMyUser()
        {   
            if($_POST){
                if ($_POST['identificacion'] == '' || $_POST['nombre'] == '' || $_POST['apellido'] == '' || $_POST['telefono'] == '' || $_POST['email'] == '') {
                    $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos.');
                }
                else{
                    dep($_POST);
                    $idUser = intval($_POST['idUser']);
                    $identificacion = strClean($_POST['identificacion']);
                    $nombre = ucwords(strClean($_POST['nombre']));
                    $apellido = ucwords(strClean($_POST['apellido']));
                    $telefono = intval(strClean($_POST['telefono']));
                    $email = strClean($_POST['email']);
                    $password = $_POST['password'];
                    $confirmPassword = $_POST['confirmPassword'];

                    $request = $this->model->searchUser($idUser, $identificacion, $email);
                }
            }
        }
       
    }

?>