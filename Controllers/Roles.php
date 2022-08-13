<?php

    class Roles extends Controller{
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(5);
        }

        public function roles()
        {
            if(empty($_SESSION['permisos'][5]['ver'])){
                header('Location: '.base_url().'sistema');
            }
            $data['page_id'] = 3;
            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Roles';
            // $data['page_title'] = 'Créditos GUAMAN - Roles';
            $data['page_name'] = 'Roles';
            $data['page_functions_js'] = 'functions_roles.js';
            $this->views->getView($this, "roles", $data);
        }

        public function getRoles()
        {   
            if($_SESSION['permisosMod']['ver']){
                $arrRoles = $this->model->selectRoles();

                for ($i=0; $i < count($arrRoles); $i++) { 
                    $btnPermisosRol = '';
                    $btnUpdateRol = '';
                    $btnDeleteRol = '';

                    if ($_SESSION['idUser'] == 1) {
                        $btnPermisosRol = '<button type="button" class=" btnPermisosRol btn btn-secondary btn-sm" onclick="permisos('.$arrRoles[$i]['idrol'].')" tilte="Permisos"><i class="fas fa-key"></i></button>';
                    }
                    if (!empty($_SESSION['permisosMod']['actualizar']) && $_SESSION['idUser'] == 1) {
                        $btnUpdateRol = '<button type="button" class="btnEditRol btn btn-primary btn-sm" onclick="editRol('.$arrRoles[$i]['idrol'].')" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>';
                    }
                    if (!empty($_SESSION['permisosMod']['eliminar']) && $_SESSION['idUser'] == 1){
                        $btnDeleteRol = ' <button type="button" class="btnDeleteRol btn btn-danger btn-sm" onclick="deleteRol('.$arrRoles[$i]['idrol'].')" tilte="Eliminar"><i class="fas fa-trash"></i></button>';
                    }

                    if ($arrRoles[$i]['status'] == 1) {
                        $arrRoles[$i]['status'] = '<div class="text-center"><span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span></div>';
                    }else{
                        $arrRoles[$i]['status'] = '<div class="text-center"><span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span></div>';
                    }

                    // BTN PERMISOS DELETE EDIT
                    $arrRoles[$i]['actions']=   '<div class="text-center">'.$btnPermisosRol.' '.$btnUpdateRol.' '.$btnDeleteRol.'</div>' ;
                }
                echo json_encode($arrRoles, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getSelectRoles()
        {
            if($_SESSION['permisosMod']['ver']){
                $htmlOptions = "";
                $arrRoles = $this->model->selectRoles();
                if (count($arrRoles) > 0) {
                    for ($i=0; $i < count($arrRoles); $i++) { 
                        if ($arrRoles[$i]['status'] == 1) {
                            $htmlOptions .= '<option value="'.$arrRoles[$i]['idrol'].'">'.$arrRoles[$i]['nombrerol'].'</option>' ;
                        }
                    }
                }
                echo $htmlOptions;
            }    
            die();
        }

        public function setRol()
        {
            $intIdrol = intval($_POST['idRol']);
            $strRol = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
            $request_rol = "";

            if (empty($intIdrol)) {
                // ROL CREATE
                $option = 1;
                if($_SESSION['permisosMod']['crear']){
                    $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
                }
            }else{
                $option=2;
                if($_SESSION['permisosMod']['actualizar']){
                    $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
                }
            }

            if ($request_rol > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            }else if($request_rol == "existe"){
                $arrResponse = array('status' => false, 'msg' => 'El rol a ingresar ya existe.');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'No se ha podido ingresar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getRol(int $idRol)
        {
            $intIdrol = intval(strClean($idRol));

            if ($idRol > 0) {
                $arrRol = $this->model->selectRol($intIdrol);
                if (empty($arrRol)) {
                    $arrResponse = array("status" => false, "msg" => "Registro no encontrado");
                }else{
                    $arrResponse = array("status" => true, "data" => $arrRol);
                }   
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function delRol()
        {
            if ($_POST) {
                $request_rol = "";
                $intIdrol = intval($_POST['idRol']);
                if($_SESSION['permisosMod']['eliminar']){
                    $request_rol = $this->model->deleteRol($intIdrol);
                }

                if($request_rol == "ok"){
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el rol.');
                }elseif ($request_rol == "existe") {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asociado a un usuario.');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el rol.');
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

    }


?>