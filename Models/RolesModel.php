<?php

    class RolesModel extends Mysql{
        public $intIdrol;
        public $strRol;
        public $strDescripcion;
        public $intStatus;


        function __construct(){
            parent::__construct();
        }

        public function selectRoles()
        {
            $whereAdmin = "";
            if ($_SESSION['idUser'] != 1) {
                $whereAdmin = " AND idrol != 1 AND idrol >= '".sessionUser($_SESSION['idUser'])['idrol']."'";

            }
            $sql_all_rol = "SELECT  * FROM roles WHERE status != 0" . $whereAdmin;
            $request = $this->selectAll($sql_all_rol);
            return $request;
        }

        // CONSULTA PARA LA TABLA ROLES
        public function selectAllRoles()
        {
            $sql_all_rol = "SELECT  * FROM roles WHERE status != 0";
            $request = $this->selectAll($sql_all_rol);
            return $request;
        }
        // -----------------------------------------

        public function insertRol(string $nameRol, string $descripcion, int $status)
        {
            $return = "";
            $this->strRol = $nameRol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql_exists_rol = "SELECT * FROM roles WHERE nombrerol = '$this->strRol'";

            $request = $this->selectAll($sql_exists_rol);

            if (empty($request)) {
                $sql_insert_rol = "INSERT INTO roles(nombrerol, descripcion, status) VALUES('$this->strRol', '$this->strDescripcion', $this->intStatus)";
                
                $request = $this->insert($sql_insert_rol);;
                $return = $request;
            }else{
                $return = "existe";
            }

            return $return;
        }

        public function selectRol(int $idRol)
        {
            $this->intIdrol = $idRol;
            $sql_select_rol = "SELECT * FROM roles WHERE idrol = $this->intIdrol";

            $request = $this->select($sql_select_rol);
            return $request;
        }

        public function selectIdRol(int $idRol)
        {
            $this->intIdrol = $idRol;
            $sql_select_rol = "SELECT idrol FROM roles WHERE idrol = $this->intIdrol";

            $request = $this->select($sql_select_rol);
            return $request;
        }

        public function updateRol(int $idRol, string $nameRol, string $descripcion, int $status)
        {
            $this->intIdrol = $idRol;
            $this->strRol = $nameRol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql_exists_rol = "SELECT * FROM roles WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
            $request = $this->selectAll($sql_exists_rol);

            if (empty($request)) {
                $sql_update_rol = "UPDATE roles SET nombrerol = '$this->strRol', descripcion = '$this->strDescripcion', status = $this->intStatus WHERE idrol = $this->intIdrol";
                
                $request = $this->update($sql_update_rol);
            }else{
                $request = "existe";
            }
            return $request;
        }

        public function deleteRol(int $idRol)
        {
            $this->intIdrol = $idRol;
            $sql_exists_user_rol = "SELECT * FROM usuario WHERE rolid = $this->intIdrol";
            $request = $this->selectAll($sql_exists_user_rol);

            if (empty($request)) {
                $sql_update_status_rol = "UPDATE roles SET status = 0 WHERE idrol = $this->intIdrol";
                
                $request = $this->update($sql_update_status_rol);

                if ($request) {
                    $request = "ok";
                }
                else{
                    $request = "error";
                }
            }else{
                $request = "existe";
            }
            return $request;
        }
    }

?>