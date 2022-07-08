<?php

    class Sistema extends Controller{
        public function __construct()
        {
            parent::__construct();
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