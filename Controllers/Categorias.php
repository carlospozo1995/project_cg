<?php
    class Categorias extends Controller{

        public function __construct() {
            sessionStart();
            parent::__construct();
            if(empty($_SESSION['login'])){
                header("Location: ".base_url()."login");
            }
            getPermisos(5);
        }

        public function categorias()
        {
            if(empty($_SESSION['permisos'][5]['ver'])){
                header('Location: '.base_url().'sistema');
            }

            $data['page_tag'] = 'Categorias';
            $data['page_title'] = 'Empresa - Categorias';
            // $data['page_title'] = 'Créditos GUAMAN - Categorias';
            $data['page_name'] = 'Categorias';
            $data['page_functions_js'] = 'functions_categorias.js';
            $this->views->getView($this, "categorias", $data);
        }

        public function getCategorias($idCategoria)
        {
            if ($_SESSION['permisosMod']['ver']) {
                $intIdCategorias = "";
                !empty($idCategoria) ? $intIdCategorias = intval($idCategoria) : "";
                $arrCategorias = $this->model->allCategorias($intIdCategorias);

                addCategorias($arrCategorias);
            }
        }

    }

?>