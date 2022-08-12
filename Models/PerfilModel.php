<?php

class  PerfilModel extends Mysql{

    private $intIdUsuario;
    private $strIdentificacion;
    private $strNombre;
    private $strApellido;
    private $intTelefono;
    private $strPassword;

    public function __construct()
    {
        parent::__construct();
    }

    public function updatePerfil(int $idUSer, string $identificacion, string $nombre, string $apellido, int $telefono, string $password){
        $this->intIdUsuario = $idUSer;
        $this->strIdentificacion = $identificacion;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->intTelefono = $telefono;
        $this->strPassword = $password;

        if ($this->strPassword != "") {
            $sql_update_user = "UPDATE project_cg.usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, password = '$this->strPassword' WHERE idusuario = $this->intIdUsuario";
        }else{
            $sql_update_user = "UPDATE project_cg.usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono WHERE idusuario = $this->intIdUsuario";
        }
        $request = $this->update($sql_update_user);
        return $request;
    }
}

?>