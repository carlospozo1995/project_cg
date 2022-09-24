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
                $sql_exists_user = "SELECT   IF(con.joinIdentificacion LIKE '%".$this->strIdentificacion."%',1,0) AS identificaciones,
                                                IF(con.joinEmail_user LIKE '%".$this->strEmail."%',1,0) AS correos
                                                FROM (SELECT GROUP_CONCAT(identificacion) AS joinIdentificacion, 
                                                             GROUP_CONCAT(email_user) AS joinEmail_user FROM project_cg.usuario 
                                                             WHERE identificacion = '".$this->strIdentificacion."' OR email_user = '".$this->strEmail."') AS con";
                $request = $this->concat($sql_exists_user);
               
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

        public function selectUsers()
        {
            $notAdmin = "";

            if ($_SESSION['idUser'] != 1){
                $notAdmin = " AND u.idusuario != 1";
            }

            $sql_select_users = "SELECT u.idusuario, u.identificacion, u.nombres, u.apellidos, u.telefono, u.email_user, u.status, r.nombrerol, r.idrol FROM project_cg.usuario u INNER JOIN project_cg.roles r ON u.rolid = r.idrol WHERE u.status != 0".$notAdmin;

            $request = $this->selectAll($sql_select_users);
            return $request;
        }

        public function selectUsuario(int $idusuario)
        {
            $this->intIdUsuario = $idusuario;
            
            $sql_select_user = "SELECT u.idusuario, u.identificacion, u.nombres, u.apellidos, u.telefono, u.email_user, r.idrol, r.nombrerol, u.status, DATE_FORMAT(u.datecreate, '%d-%m-%Y') AS fechaRegistro FROM project_cg.usuario u INNER JOIN project_cg.roles r ON u.rolid = r.idrol WHERE u.idusuario = $this->intIdUsuario";
            $request = $this->select( $sql_select_user);
            return $request;
        }

        public function updateUser(int $iduser, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, int $rolUser, int $status, string $password)
        {
            $this->intIdUsuario = $iduser;
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->intUserRol = $rolUser;
            $this->intStatus = $status;
            $this->strPassword = $password;

            $sql_exists_user = "SELECT * FROM project_cg.usuario WHERE (identificacion = '{$this->strIdentificacion}' AND idusuario != $this->intIdUsuario) OR (email_user = '{$this-> strEmail}' AND idusuario != $this->intIdUsuario)";
            $request = $this->selectAll($sql_exists_user);

            if (empty($request)) {
                if ($this->strPassword != '') {
                    $sql_update_user = "UPDATE project_cg.usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail', password = '$this->strPassword', rolid = $this->intUserRol, status = $this->intStatus WHERE idusuario = $this->intIdUsuario";
                }else{
                    $sql_update_user = "UPDATE project_cg.usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail', rolid = $this->intUserRol, status = $this->intStatus WHERE idusuario = $this->intIdUsuario";
                }

                $request = $this->update($sql_update_user);
            }else{
                $idenValidate = false;
                $emailValidate = false;
                
                array_filter($request, function ($data) use(&$idenValidate, &$emailValidate)
                {
                    if ($data['identificacion'] == $this->strIdentificacion) {
                        $idenValidate = true;
                    }
                    if ($data['email_user'] == $this->strEmail) {
                        $emailValidate = true;
                    }
                });

                if ($idenValidate && $emailValidate) {
                    $request = "Existe correo e identificacion";
                }elseif ($idenValidate) {
                    $request = "Existe identificacion"; 
                }elseif ($emailValidate) {
                    $request = "Existe correo"; 
                }

            }
            return $request;
        }

        public function deleteUser(int $idusuario)
        {
            $this->intIdUsuario = $idusuario;
            $sql_update_status_user = "UPDATE project_cg.usuario SET status = 0 WHERE idusuario = $this->intIdUsuario";
            $request = $this->update($sql_update_status_user);

            if ($request) {
                $request = "ok";
            }else{
                $request = "error";
            }
            return $request;
        }
    }

?>