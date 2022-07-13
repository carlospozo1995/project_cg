<?php

    class PermisosModel extends Mysql{
        public function __construct()
        {
            parent::__construct();        
        }
        
        public function selectModulos()
        {
            $sql_modulos = "SELECT * FROM project_cg.modulos WHERE status != 0";
            $request = $this->selectAll($sql_modulos);
            return $request;
        }
    
    }

    

?>