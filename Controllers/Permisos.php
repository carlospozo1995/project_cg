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
                $arrPermisos = $this->model->selectPermisos($rolid);

                // ----------------------------------------
                // ----------------------------------------
                $arrDataPermisos = array('ver' => 0, 'crear' => 0, 'actualizar' => 0, 'eliminar' => 0);
                $arrIdPermiso = array("rolid" => $rolid);
                // ----------------------------------------
                // ----------------------------------------

                if (empty($arrPermisos)) {
                    for ($i=0; $i < count($arrModulos); $i++) { 
                        $arrModulos[$i]['permisos'] = $arrDataPermisos;
                    }
                }else{
                    for ($i=0; $i < count($arrModulos); $i++) { 
                        $arrDataPermisos = array('ver' => $arrPermisos[$i]['ver'],
                                             'crear' => $arrPermisos[$i]['crear'],
                                             'actualizar' => $arrPermisos[$i]['actualizar'],
                                             'eliminar' => $arrPermisos[$i]['eliminar']
                                            );

                        if ($arrModulos[$i]['idmodulo'] == $arrPermisos[$i]['moduloid']) {
                            $arrModulos[$i]['permisos'] = $arrDataPermisos;
                        }
                    }
                }

                $arrIdPermiso['modulo'] = $arrModulos;
                return getModal("modalPermisos", $arrIdPermiso);
            }
        }
    }

?>