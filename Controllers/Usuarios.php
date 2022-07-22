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
            // $data['page_title'] = 'Créditos GUAMAN - Usuarios';
            $data['page_name'] = 'Usuarios';
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

                    if (empty($intUserid)) {
                        // USER CREATE
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);

                        $request_user = $this->model->insertUser($strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $intStatus, $strPassword);
                    }else{
                        // UPDATE USER
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? '' : hash("SHA256", $_POST['txtPassword']);

                        $request_user = $this->model->updateUser($intUserid, $strIdentificacion, $strNombre, $strApellido, $intTelefono, $strEmail, $intRoluser, $intStatus, $strPassword);
                    }

                    if ($request_user > 0) {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => "Datos guardados correctamente.");
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

        public function getUsuarios()
        {
            $arrUsers = $this->model->selectUsers();

            for ($i=0; $i < count($arrUsers); $i++) { 
                if ($arrUsers[$i]['status'] == 1) {
                    $arrUsers[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                }else{
                    $arrUsers[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                }

                // BTN PERMISOS DELETE EDIT

            $arrUsers[$i]['actions']= '<div class="text-center">
                                            <button type="button" class="btnViewUser btn btn-secondary btn-sm" us="'.$arrUsers[$i]['idusuario'].'" tilte="Ver"><i class="fas fa-eye"></i></button>
                                            <button type="button" class="btnEditUser btn btn-primary btn-sm" us="'.$arrUsers[$i]['idusuario'].'" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btnDeleteUser btn btn-danger btn-sm" us="'.$arrUsers[$i]['idusuario'].'" tilte="Eliminar"><i class="fas fa-trash"></i></button>
                                       </div>' ;
            }


            echo json_encode($arrUsers, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function viewUsuario(int $idUser)
        {
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
            die();
        }

    }

?>