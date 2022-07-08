<?php

    class Index extends Controller{

        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = 'Home';
            $data['page_title'] = 'Pagina principal';
            $data['page_name'] = 'Home';
            $this->views->getView($this, "index", $data);
        }
    }



?>