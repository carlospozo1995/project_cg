<?php

    class Conexion{
        private $conexion;

        public function __construct(){
            $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $this->conexion->set_charset(DB_CHARSET);
            if($this->conexion->connect_error){
                die("LA CONEXION A LA BASE DE DATOS A FALLADO" . $this->conexion->connect_error);
            }else{
                // echo "CONEXION EXISTOSA";
            }
        }

        public function conexion()
        {
            return $this->conexion;
        }
    }

?>