<?php

    class PermisosModel extends Mysql{
        public $intIdpermiso;
        public $intRolid;
        public $intModuloid;
        public $ver;
        public $crear;
        public $actualizar;
        public $eliminar;

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

        public function selectPermisos(int $rolid)
        {
            $this->intRolid = $rolid;
            $sql_permisos = "SELECT * FROM project_cg.permisos WHERE rolid = $this->intRolid";
            $request = $this->selectAll($sql_permisos);
            return $request;
        }
    }

    

?>