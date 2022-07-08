<?php

    class RolesModel extends Mysql{

        function __construct(){
            parent::__construct();
        }

        public function selectRoles()
        {
            $sql = "SELECT  * FROM project_cg.roles WHERE status != 0";
            $request = $this->selectAll($sql);
            return $request;
        }

    }

?>