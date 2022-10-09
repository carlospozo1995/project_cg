<?php

class  PerfilModel extends Mysql{

    private $intIdUsuario;
    private $strNombre;
    private $strApellido;
    private $intTelefono;
    private $strEmail;
    private $strPassword;

    public function __construct()
    {
        parent::__construct();
    }

    public function updatePerfil(int $idUSer, string $nombre, string $apellido, int $telefono, string $email, string $password){
        $this->intIdUsuario = $idUSer;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->intTelefono = $telefono;
        $this->strEmail = $email;
        $this->strPassword = $password;

        $sql_exist_email = "SELECT * FROM usuario WHERE email_user = '{$this-> strEmail}' AND idusuario != $this->intIdUsuario";
        $request_email = $this->selectAll($sql_exist_email);

        if (empty($request_email)) {
            if ($this->strPassword != "") {
                $sql_update_user = "UPDATE usuario SET nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail', password = '$this->strPassword' WHERE idusuario = $this->intIdUsuario";
            }else{
                $sql_update_user = "UPDATE usuario SET nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail' WHERE idusuario = $this->intIdUsuario";
            }
            $request = $this->update($sql_update_user);
        }else{
            $request = "existe";
        }

       
        return $request;
    }
}

?>