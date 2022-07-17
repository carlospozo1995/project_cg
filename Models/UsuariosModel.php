<?php

    class  UsuariosModel extends Mysql{

        public $idUser;
        public $strCedula;
        public $strNombres;
        public $strApellidos;
        public $intTelefono;
        public $strEmail;
        public $intUserRol;
        public $intStatus;
        public $strPassword;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertUser(string $cedula, string $nombres, string $apellidos, int $telefono, string $email, int $rolUser, int $status, string $password)
        {

            $this->strCedula = $cedula;
            $this->strNombres = $nombres;
            $this->strApellidos = $apellidos;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->intUserRol = $rolUser;
            $this->intStatus = $status;
            $this->strPassword = $password;

            if () {
                # code...
            }
            // $sql_insert_user = "INSERT INTO project_cg.uuario(identificacion, nombres, apellidos, telefono, email_user, password, rolid, status) VALUES()";
        }
    }

?>