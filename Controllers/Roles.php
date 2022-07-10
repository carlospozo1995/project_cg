<?php

    class Roles extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function roles()
        {
            $data['page_id'] = 3;
            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Roles';
            // $data['page_title'] = 'Créditos GUAMAN - Roles';
            $data['page_name'] = 'Roles';
            $this->views->getView($this, "roles", $data);
        }

        public function getRoles()
        {
            $arrRoles = $this->model->selectRoles();

            for ($i=0; $i < count($arrRoles); $i++) { 
                if ($arrRoles[$i]['status'] == 1) {
                    $arrRoles[$i]['status'] = '<span class="bg-success p-1 rounded"><i class="fas fa-user"></i> Activo</span>';
                }else{
                    $arrRoles[$i]['status'] = '<span class="bg-danger p-1 rounded"><i class="fas fa-user-slash"></i> Inactivo</span>';
                }

                // BTN PERMISOS DELETE EDIT

            $arrRoles[$i]['actions']= '<div class="text-center">
                                            <button type="button" class=" btnPermisosRol btn btn-secondary btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Permisos"><i class="fas fa-key"></i></button>
                                            <button type="button" class="btnEditRol btn btn-primary btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btnDeleteRol btn btn-danger btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Eliminar"><i class="fas fa-trash"></i></button>
                                       </div>' ;
            }


            echo json_encode($arrRoles, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setRol()
        {
            $intIdrol = intval($_POST['idRol']);
            $strRol = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);

            if (empty($intIdrol)) {
                // ROL CREATE
                $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
                $option = 1;
            }else{
                $request_rol = 1;
                $option= 2;
            }
            if ($request_rol > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos ingresados correctamente.');
                }else {
                    $arrResponse = array('status' => true, 'msg' => 'Dato actualizado correctamente.');
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

    }


?>