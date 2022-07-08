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
            $data['page_title'] = 'Binevenido';
            $data['page_name'] = 'Sistema';
            $this->views->getView($this, "sistema", $data);
        }
    }

?>