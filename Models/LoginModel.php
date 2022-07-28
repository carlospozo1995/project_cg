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

            // if (empty($request)){
            //     $sql_same = "SELECT IF(condata.usersgroup LIKE '%".$this->strUsuario."%',1,0) AS usuario, 
            //     IF(condata.passgroup LIKE '%".$this->strPassword."%',1,0) AS clave 
            //     FROM(SELECT GROUP_CONCAT(usuario) AS usersgroup, 
            //                 GROUP_CONCAT(clave) AS passgroup 
            //                 FROM project_cg.usuario WHERE email_user = '$this->strUsuario' OR password = '$this->strPassword') AS condata";

            //     $request = $this->concat($sql_same);
            // }
        }
    }

?>