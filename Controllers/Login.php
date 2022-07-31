<?php
    class Login extends Controller{

        public function __construct()
        {
            session_start();
            if (isset($_SESSION['login'])){
                header("Location: ".base_url()."sistema");
            }
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
                    }else{
                        $arrData = $requestUser;
                        if ($arrData['status'] == 1) {
                            $_SESSION['idUser'] = $arrData['idusuario'];
                            $_SESSION['login'] = true;

                            $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                            $_SESSION['userData'] = $arrData;

                            $arrResponse = array('status' => true, 'msg' => 'ok');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'El usuario esta inactivo');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

        }

        public function resetPass()
        {
            if ($_POST) {

                if (empty($_POST['txtResetEmail'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                }else{
                    $token = token();
                    $strEmail = strtolower(strClean($_POST['txtResetEmail']));
                    $arrData = $this->model->getUserEmail($strEmail);

                    if (empty($arrData)){
                        $arrResponse = array('status' => false, 'msg' => 'El usuario ha recuperar la contraseña no existe.');
                    }else{
                        $idUser = $arrData['idusuario'];
                        $nameUser = $arrData['nombres'].' '.$arrData['apellidos'];

                        $url_recovery = base_url().'login/confirmUser/'.$strEmail.'/'.$token;
                        // dep($url_recovery);
                        $requestUpdate = $this->model->setTokenUser($idUser, $token);
                    
                        if($requestUpdate){
                            $arrResponse = array('status' => true, 'msg' => 'Se ha enviado un mensaje a tu cuenta de correo para restablecer tu contraseña.');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso intentalo mas tarde.');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function confirmUser(string $params)
        {   
            if (empty($params)) {
                header('Location:' . base_url() . 'login');
                // header('Location:' . base_url());
            }else{
                $arrParams =  explode(',', $params);
                $strEmail = strClean($arrParams[0]);
                $strToken = strClean($arrParams[1]);

                $arrResponse = $this->model->getUsuario($strEmail, $strToken);
                if (empty($arrResponse)) {
                    header('Location:' . base_url() . 'login');
                // header('Location:' . base_url());
                }else{
                    $data['page_tag'] = 'Login';
                    $data['page_title'] = 'Cambiar contraseña';
                    $data['page_name'] = 'Cambiar contraseña';
                    $data['idusuario'] = $arrResponse['idusuario'];
                    $data['email'] = $strEmail;
                    $data['token'] = $strToken;
                    // $data['page_title'] = 'Créditos GUAMAN - Login';
                    $data['page_functions_js'] = 'functions_login.js';
                    $this->views->getView($this, "reset_password", $data);
                }
            }
            die();
        }

        public function setPassword()
        {
            if($_POST){
                if(empty($_POST['idUsuario']) || empty($_POST['txtEmail']) || empty($_POST['txtToken']) ||empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                }else{
                    $intIdUsuario = intval($_POST['idUsuario']);
                    $strEmail = strClean($_POST['txtEmail']);
                    $strToken = strClean($_POST['txtToken']);
                    $strPassword = $_POST['txtPassword'];
                    $strPasswordConfirm = $_POST['txtPasswordConfirm'];

                    if($strPassword != $strPasswordConfirm){
                        $arrResponse = array('status' => false, 'msg' => 'Las contraseñas deben ser iguales.');
                    }else{
                        $arrResponseUser = $this->model->getUsuario($strEmail, $strToken);
                        if(empty($arrResponseUser)){
                            $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                        }else{
                            $strPassword = hash("SHA256", $strPassword);
                            $requestPass = $this->model->insertPassword($intIdUsuario, $strPassword);
                        }
                    }
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }



?>