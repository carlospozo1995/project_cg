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
                $arrPermisosRol = $this->model->selectPermisos($rolid);

                // ----------------------------------------
                // ----------------------------------------
                $arrPermisos = array('ver' => 0, 'crear' => 0, 'actualizar' => 0, 'eliminar' => 0);

                $arrRolPermiso = array("rolid" => $rolid);
                // ----------------------------------------
                // ----------------------------------------

                if (empty($arrPermisosRol)) {
                    for ($i=0; $i < count($arrModulos); $i++) { 
                        $arrModulos[$i]['permisos'] = $arrPermisos;
                    }
                }else{
                    for ($i=0; $i < count($arrModulos); $i++) { 
                        $arrPermisos = array('ver' => $arrPermisosRol[$i]['ver'],
                                             'crear' => $arrPermisosRol[$i]['crear'],
                                             'actualizar' => $arrPermisosRol[$i]['actualizar'],
                                             'eliminar' => $arrPermisosRol[$i]['eliminar']
                                            );
                    }
                }
            }
        }
    }

?>