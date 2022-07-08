<?php

    class Mysql extends  Conexion
    {
        private $conexion;
        private $strquery;

        public function __construct()
        {
            $this->conexion = new Conexion;
            $this->conexion = $this->conexion->conexion();
        }
    }
    

?>