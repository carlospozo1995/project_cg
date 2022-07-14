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
                // TODOS LOS DATOS DE LA TABLA ROLES
                $arrRoles = $this->model->selectRoles($rolid);

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
                $arrIdPermiso['rolTitulo'] = $arrRoles;
                return getModal("modalPermisos", $arrIdPermiso);
            }
            die();
        }

        public function setPermisos()
        {
            if ($_POST) {
                $intRolid = intval($_POST['rolid']);
                $modulos = $_POST['modulos'];

                $this->model->deletePermisos($intRolid);

                foreach ($modulos as $key => $value) {
                    $idModulo = $value['idmodulo'];

                    $ver = empty($value['ver']) ? 0 : 1;
                    $crear = empty($value['crear']) ? 0 : 1;
                    $actualizar = empty($value['actualizar']) ? 0 : 1;
                    $eliminar = empty($value['eliminar']) ? 0 : 1;

                    $requestPermiso = $this->model->insertPermisos($intRolid, $idModulo, $ver, $crear, $actualizar, $eliminar);

                }

                if ($requestPermiso > 0) {
                    $arrResponse = array("status" => true, "msg" => "Permisos asignados correctamente.");
                }else{
                    $arrResponse = array("status" => false, "msg" => "No es posible asignar los permisos.");
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }

?>