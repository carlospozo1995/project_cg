<?php

    class Roles extends Controller{
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(3);
        }

        public function roles()
        {
            if(empty($_SESSION['permisos'][3]['ver'])){
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
                    $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.', 'idData' => $request_rol, 'permisos' => $_SESSION['permisosMod'], 'idUser'=> $_SESSION['idUser']);
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