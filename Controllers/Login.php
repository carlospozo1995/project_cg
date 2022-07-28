<?php

    class Login extends Controller{

        public function __construct()
        {
            parent::__construct();
        }
        
        public function login()
        {
            $data['page_tag'] = 'Login';
            $data['page_title'] = 'Login';
            $data['page_name'] = 'Login';
            // $data['page_title'] = 'Créditos GUAMAN - Login';
            $data['page_functions_js'] = 'functions_login.js';
            $this->views->getView($this, "login", $data);
        }

        public function loginUser()
        {
            if($_POST){
                if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                }else{
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $strPassword = hash("SHA256", $_POST['txtPassword']);
                    $requestUser = $this->model->loginUser($strEmail, $strPassword);

                    if (empty($requestUser)){
                        $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña son incorrectos');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

        }
    }



?>