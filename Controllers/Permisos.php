<?php

    class Permisos extends  Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function getPermisosRol(int $idrol)
        {
            $rolid = intval($idrol);

            if ($rolid > 0) {
                // TODOS LOS DATOS DE LA TABLA MODULOS
                $arrModulos = $this->model->selectModulos();

                // TODOS LOS DATOS DE LA TABLA PERMISOS (vacios por el momento)
                $arrPermisosRol = $this->model->selectPermisosRol($rolid);

            }
        }
    }

?>