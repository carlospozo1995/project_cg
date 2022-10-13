<?php

	class Clientes extends Controller {
        
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            if (empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }

            getPermisos(6);
        }

        public function clientes()
        {
            if(empty($_SESSION['permisosMod']['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Sistema';
            $data['page_title'] = 'Empresa - Clientes';
            // $data['page_title'] = 'Créditos GUAMAN - Clientes';
            $data['page_name'] = 'Clientes';
            $data['page_functions_js'] = 'functions_clientes.js';
            $this->views->getView($this, "clientes", $data);
        }
    }

?>