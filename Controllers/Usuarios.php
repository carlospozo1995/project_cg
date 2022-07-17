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

        public function setUsers()
        {
            if ($_POST) {
                $intUserid = intval($_POST['idUser']);
                $strCedula = strClean($_POST['txtCedula']);
                $strNombres = strClean($_POST['txtNombres']);
                $strApellidos = strClean($_POST['txtApellidos']);
                $intTelefono = intval($_POST['txtTelefono']);
                $strEmail = strClean($_POST['txtEmail']);
                $intRoluser = intval($_POST['listRolid']);
                $intStatus = intval($_POST['listStatus']);
                $strPassword = md5($_POST['txtPassword']);

                if (empty($intUserid)) {
                    $this->model->insertUser($strCedula, $strNombres, $strApellidos, $intTelefono, $strEmail, $intRoluser, $intStatus, $strPassword);
                }
            }
        }

    }

?>