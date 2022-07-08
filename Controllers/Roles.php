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
                    $arrRoles[$i]['status'] = '<span class="bg-success p-1 rounded">Activo</span>';
                }else{
                    $arrRoles[$i]['status'] = '<span class="bg-danger p-1 rounded">Inactivo</span>';
                }
            }

            echo json_encode($arrRoles, JSON_UNESCAPED_UNICODE);
            die();
        }

    }

?>