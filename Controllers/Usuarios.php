<?php 

    class Usuarios extends Controller {
        
        public function __construct()
        {
            parent::__construct();
        }

        public function usuarios()
        {
            $data['page_id'] = 4;
            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Usuarios';
            // $data['page_title'] = 'Créditos GUAMAN - Roles';
            $data['page_name'] = 'Usuarios';
            $this->views->getView($this, "usuarios", $data);
        }

        public function setUsuario()
        {
            if ($_POST) {
                

                if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => "Datos incorrectos.");
                }else{
                    // $intUserid = intval($_POST['idUsuario']);
                    $strIdentificacion = intval($_POST['txtIndentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strClean($_POST['txtEmail']);
                    $intRoluser = intval(strClean($_POST['listRolid']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                
                    $request_user = $this->model->insertUser($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $intStatus);
                }
            }
            die();
        }

    }

?>