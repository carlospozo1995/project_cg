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
                                            <button type="button" class="btn btn-secondary btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Permisos"><i class="fas fa-key"></i></button>
                                            <button type="button" class="btn btn-primary btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Editar"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" rl="'.$arrRoles[$i]['idrol'].'" tilte="Eliminar"><i class="fas fa-trash"></i></button>
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

            if ($intIdrol == 0) {
                $request_newRol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            }
        }

    }

?>