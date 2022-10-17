<?php

    class Index extends Controller{

        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $data['page_title'] = 'Créditos GUAMAN - Todo para el hogar';
            $this->views->getView($this, "index", $data);
        }
    }



?>