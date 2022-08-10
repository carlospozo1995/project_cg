<?php

    class PerfilModel extends Mysql{
        private $intIdUser;
        private $strIdentificacion;
        private $strNombre;
        private $strApellido;
        private $intTelefono;
        private $strEmail;
        private $strPassword;
        private $strConfirmPassword;

        public function __construct()
        {
            parent::__construct();
        }

        public function updateUser(int $idUser ,string $identificacion, string $email)
        {
            $this->intIdUser = $idUser;
            $this->strIdentificacion = $identificacion;
            $this->strEmail = $email;

            $sql_exists_user = "SELECT * FROM project_cg.usuario WHERE (identificacion = '$this->strIdentificacion' AND idusuario != $this->intIdUser) OR (email_user = '$this->strEmail' AND idusuario != $this->intIdUser)";

            $request = $this->selectAll($sql_exists_user);


        }
    }

?>