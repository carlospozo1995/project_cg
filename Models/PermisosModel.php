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
        
        public function selectRoles(int $idrol)
        {
            $sql_modulos = "SELECT * FROM roles WHERE idrol = $idrol";
            $request = $this->selectAll($sql_modulos);
            return $request;
        }

        public function selectModulos()
        {
            $sql_modulos = "SELECT * FROM modulos WHERE status != 0";
            $request = $this->selectAll($sql_modulos);
            return $request;
        }

        public function selectPermisos(int $rolid)
        {
            $this->intRolid = $rolid;
            $sql_permisos = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
            $request = $this->selectAll($sql_permisos);
            return $request;
        }

        public function deletePermisos(int $rolid)
        {
           $this->intRolid = $rolid;

           $sql_deletePermiso = "DELETE FROM  permisos WHERE rolid = $this->intRolid";
           $request = $this->delete($sql_deletePermiso);
           return $request;
        }

        public function insertPermisos(int $rolid, int $idmodulo, int $ver, int $crear, int $actualizar, int $eliminar)
        {
            $this->intRolid = $rolid;
            $this->intModuloid = $idmodulo;
            $this->ver = $ver;
            $this->crear = $crear;
            $this->actualizar = $actualizar; 
            $this->eliminar = $eliminar;

            $sql_update_permisos = "INSERT INTO permisos(rolid, moduloid, ver, crear, actualizar, eliminar) VALUES($this->intRolid, $this->intModuloid, $this->ver, $this->crear, $this->actualizar, $this->eliminar)";
            $request = $this->insert($sql_update_permisos);
            return $request;
        }

        public function permisosModulo(int $rolid)
        {
            $this->intRolid = $rolid;
            $sql_get_permisos = "SELECT p.rolid, p.moduloid, m.titulo AS modulo, p.ver, p.crear, p.actualizar, p.eliminar FROM permisos p INNER JOIN modulos m ON p.moduloid = m.idmodulo WHERE p.rolid = $this->intRolid";
            
            $request = $this->selectAll($sql_get_permisos);
            // return $request;
            $newArrayPermisos = array();
            for ($i=0; $i < count($request); $i++) { 
                $newArrayPermisos[$request[$i]['moduloid']] = $request[$i];
            } 
            return $newArrayPermisos;
        }
    }

?>