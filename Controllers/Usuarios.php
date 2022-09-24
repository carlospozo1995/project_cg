<?php 

    class Usuarios extends Controller {
        
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(2);
        }

        public function usuarios()
        {
            if(empty($_SESSION['permisos'][2]['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_id'] = 4;
            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Usuarios';
            // $data['page_title'] = 'Créditos GUAMAN - Usuarios';
            $data['page_name'] = 'Usuarios';
            $data['page_functions_js'] = 'functions_usuarios.js';
            $this->views->getView($this, "usuarios", $data);
        }

        public function setUsuario()
        {
            if ($_POST) {
                if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => "Datos incorrectos.");
                }else{
                    $intUserid = intval($_POST['idUsuario']);
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strClean($_POST['txtEmail']);
                    $intRoluser = intval(strClean($_POST['listRolid']));
                    $intStatus = intval(strClean($_POST['listStatus']));
                    $request_user = "";
                    if (empty($intUserid)) {
                        // USER CREATE
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);

                        if($_SESSION['permisosMod']['crear']){
                            $request_user = $this->model->insertUser($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $intStatus, $strPassword);
                        }
                    }else{
                        // UPDATE USER
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? '' : hash("SHA256", $_POST['txtPassword']);
                        if($_SESSION['permisosMod']['actualizar']){
                            $request_user = $this->model->updateUser($intUserid, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $intStatus, $strPassword);
                        }
                    }

                    if ($request_user > 0) {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.", "idData" => $request_user, 'permisos' => $_SESSION['permisosMod'], "userData" => $_SESSION['userData']);
                        }else{
                            $arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente.");
                        }
                    }else if ($request_user == "Existe correo e identificacion"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! La identificación y el correo ya existen. Intentelo de nuevo por favor.");
                    }else if ($request_user == "Existe identificacion"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! La identificación ya existe. Intentelo de nuevo por favor.");
                    }else if ($request_user == "Existe correo"){
                        $arrResponse = array("status" => false, "msg" => "!Atención! El email ya existe. Intentelo de nuevo por favor.");
                    }else{
                        $arrResponse = array("status" => false, "msg" => "No es posible ingresar los datos.");
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function viewUsuario($idUser)
        {   
            if($_SESSION['permisosMod']['ver']){
                $idusuario = intval($idUser);
                if ($idusuario > 0) {
                    $arrUser = $this->model->selectUsuario($idusuario);
                    if (empty($arrUser)) {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrResponse = array('status' => true, 'data' => $arrUser);
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }

        public function delUser(int $idUser)
        {
            $request_user = "";
            $intUser = intval($idUser);
            if($_SESSION['permisosMod']['eliminar']){
                $request_user = $this->model->deleteUser($intUser);
            }

            if ($request_user == "ok"){
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

    }

?>