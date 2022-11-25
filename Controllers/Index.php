<?php
    require_once('Models/TSlider.php');

    class Index extends Controller{

        public $traits;

        public function __construct()
        {
            $this->traits = new traitsSlider();
            parent::__construct();
        }
        
        public function index()
        {   
            $data['page_title'] = 'Créditos GUAMAN - Todo para el hogar';
            $data['sliderCtg'] = $this->traits->getCtgT(CAT_SLIDER);
            $data['sliderProd'] = $this->traits->getProdT(PROD_SLIDER);
            $this->views->getView($this, "index", $data);
        }
    }



?>