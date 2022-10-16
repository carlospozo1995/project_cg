<?php

     class  ClientesModel extends Mysql{

        private $intIdCliente;
        private $strIdentificacion;
        private $strNombre;
        private $strApellido;
        private $intTelefono;
        private $strEmail;
        private $strToken;
        private $intClienteRol;
        private $strPassword;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, int $rolUser, string $password)
        {
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->intClienteRol = $rolUser;
            $this->strPassword = $password;

            $return = 0;

            $sql_exists_user = "SELECT * FROM usuario WHERE identificacion = '{$this->strIdentificacion}' OR email_user = '{$this-> strEmail}'";

            $request = $this->selectAll($sql_exists_user);
           
            if (empty($request)) {
                $sql_insert_cliente = "INSERT INTO usuario(identificacion, nombres, apellidos, telefono, email_user, password, rolid) VALUES('$this->strIdentificacion', '$this->strNombre', '$this->strApellido', $this->intTelefono, '$this->strEmail', '$this->strPassword', $this->intClienteRol)";
                
                $request = $this->insert($sql_insert_cliente);
                $return = $request;
            }else{
                $sql_exists_user = "SELECT   IF(con.joinIdentificacion LIKE '%".$this->strIdentificacion."%',1,0) AS identificaciones,
                                                IF(con.joinEmail_user LIKE '%".$this->strEmail."%',1,0) AS correos
                                                FROM (SELECT GROUP_CONCAT(identificacion) AS joinIdentificacion, 
                                                             GROUP_CONCAT(email_user) AS joinEmail_user FROM usuario 
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
    
        public function selectClientes()
        {
            $sql_select_clientes = "SELECT * FROM usuario where rolid = 5 AND status != 0";
            return  $this->selectAll($sql_select_clientes);
        }

        public function updateCliente(int $idCliente, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password)
        {
            $this->intIdCliente = $idCliente;
            $this->strIdentificacion = $identificacion;
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strPassword = $password;

            $sql_exists_cliente = "SELECT * FROM usuario WHERE (identificacion = '{$this->strIdentificacion}' AND idusuario != $this->intIdCliente) OR (email_user = '{$this-> strEmail}' AND idusuario != $this->intIdCliente)";
            $request = $this->selectAll($sql_exists_cliente);

            if (empty($request)) {
                if ($this->strPassword != '') {
                    $sql_update_cliente = "UPDATE usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail', password = '$this->strPassword' WHERE idusuario = $this->intIdCliente";
                }else{
                    $sql_update_cliente = "UPDATE usuario SET identificacion = '$this->strIdentificacion', nombres = '$this->strNombre', apellidos = '$this->strApellido', telefono = $this->intTelefono, email_user = '$this->strEmail' WHERE idusuario = $this->intIdCliente";
                }

                $request = $this->update($sql_update_cliente);
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
    }

?>