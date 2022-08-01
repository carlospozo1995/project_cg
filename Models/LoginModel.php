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

        public function getUserEmail(string $email)
        {
            $this->strUsuario = $email;
            $sql_get_email_user = "SELECT idusuario, nombres, apellidos, status FROM project_cg.usuario WHERE email_user = '$this->strUsuario' AND status = 1";

            $request = $this->select($sql_get_email_user);
            return $request;
        }

        public function setTokenUser(int $idUser, string $token)
        {
            $this->intIdUsuario = $idUser;
            $this->strToken = $token;

            $sql_update_token_user = "UPDATE project_cg.usuario SET toke = '$this->strToken' WHERE idusuario = $this->intIdUsuario";

            $request = $this->update($sql_update_token_user);
            return $request;
        }

        public function getUsuario(string $email, string $token)
        {
            $this->strUsuario = $email;
            $this->strToken = $token;

            $sql_select_user = "SELECT idusuario FROM project_cg.usuario WHERE email_user = '$this->strUsuario' AND toke = '$this->strToken' AND status = 1"; 
            $request = $this->select($sql_select_user);
            return $request;
        }

        public function insertPassword(int $idUser, string $password)
        {
            $this->intIdUsuario = $idUser;
            $this->strPassword = $password;

            $sql_update_password = "UPDATE project_cg.usuario SET password = '$this->strPassword', toke = null WHERE idusuario = $this->intIdUsuario";
            $request = $this->update($sql_update_password);
            return $request;
        }
    }

?>