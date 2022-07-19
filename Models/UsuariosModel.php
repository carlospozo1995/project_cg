<?php

    class  UsuariosModel extends Mysql{

        private $intIdUsuario;
        private $strIdentificacion;
        private $strNombre;
        private $strApellido;
        private $intTelefono;
        private $strEmail;
        private $strToken;
        private $intUserRol;
        private $intStatus;
        private $strPassword;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertUser(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, int $rolUser, int $status, string $password)
        {
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->intUserRol = $rolUser;
            $this->intStatus = $status;
            $this->strPassword = $password;

            $return = 0;

            $sql_exists_user = "SELECT * FROM project_cg.usuario WHERE identificacion = '{$this->strIdentificacion}' OR email_user = '{$this-> strEmail}'";

            $request = $this->selectAll($sql_exists_user);
           
            if (empty($request)) {
                $sql_insert_user = "INSERT INTO project_cg.usuario(identificacion, nombres, apellidos, telefono, email_user, password, rolid, status) VALUES('$this->strIdentificacion', '$this->strNombre', '$this->strApellido', $this->intTelefono, '$this->strEmail', '$this->strPassword', $this->intUserRol, $this->intStatus)";
                
                $request = $this->insert($sql_insert_user);
                $return = $request;
            }else{
                $sql_exists = "SELECT   IF(con.joinIdentificacion LIKE '%".$this->strIdentificacion."%',1,0) AS identificaciones,
                                                IF(con.joinEmail_user LIKE '%".$this->strEmail."%',1,0) AS correos
                                                FROM (SELECT GROUP_CONCAT(identificacion) AS joinIdentificacion, 
                                                             GROUP_CONCAT(email_user) AS joinEmail_user FROM project_cg.usuario 
                                                             WHERE identificacion = '".$this->strIdentificacion."' OR email_user = '".$this->strEmail."') AS con";
                $request = $this->concat($sql_exists);
               
                if(!empty($request)){
                    if($request['identificaciones'] && $request['correos']){
                        $return = "Existe correo e identificacion";
                    }elseif ($request['identificaciones']) {
                        $return = "Existe identificacion"; 
                    }elseif ($request['correos']) {
                        $return = "Existe correo";
                    }
                }   
            }
            return $return;
        }
    }

?>
