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
            $data['page_name'] = 'Roles usuario';
            $this->views->getView($this, "roles", $data);
        }
    }

?>