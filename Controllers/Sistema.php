<?php

    class Sistema extends Controller{
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(1);
        }

        public function sistema()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Sistema';
            // $data['page_title'] = 'Créditos GUAMAN - Sistema';
            $data['page_name'] = 'Bienvenido al sistema';
            $this->views->getView($this, "sistema", $data);
        }
    }

?>