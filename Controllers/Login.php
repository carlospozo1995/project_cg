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
            $strEmail = strClean($_POST['txtEmail']);
            $strPassword = $_POST['txtPassword'];

            
        }
    }



?>