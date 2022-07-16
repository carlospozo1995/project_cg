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
            dep($_POST);
        }

    }

?>