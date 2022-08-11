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
    }
}

?>