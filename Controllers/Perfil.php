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

        public function updateMyUser(int $idUser)
        {   
            dep($_POST);
            $idUsuario  = intval($idUser);
            if ($idUsuario > 0) {
                $arrUser = $this->model->selectUsuario($idUsuario);
            }
            die();
        }
       
    }

?><acronym title=""></acronym>