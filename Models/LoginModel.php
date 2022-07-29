<?php

    class LoginModel extends Mysql{
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {
            parent::__construct();        
        }

        public function loginUser(string $email, string $password)
        {
            $this->strUsuario = $email;
            $this->strPassword = $password;

            $sql_get_user = "SELECT idusuario, status FROM project_cg.usuario WHERE email_user = '$this->strUsuario' AND password = '$this->strPassword' AND status != 0";

            $request = $this->select($sql_get_user);
            return $request;
        }

        public function sessionLogin(int $iduser)
        {
            $this->intIdUsuario = $iduser;
            // BUSCAR ROL DEL ID
            $sql_search_rol  = "SELECT u.idusuario, u.identificacion, u.nombres, u.apellidos, u.telefono, u.email_user, r.idrol, r.nombrerol, r.status FROM project_cg.usuario u INNER JOIN project_cg.roles r ON u.rolid = r.idrol WHERE u.idusuario = $this->intIdUsuario";

            $request = $this->select($sql_search_rol);
            return $request;
        }
    }

?>