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

        // DEVOLVER TODOS LOS REGISTROS

        public function selectAll(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            $data = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $data[] = $item;
            }
            return $data;
        }

        // INSERTAR DATOS EN DATABASE

        public function insert(string $query)
        {
            $this->strquery = $query;
            $insert = $this->conexion->query($this->strquery);
            if ($insert) {
                $lastId = mysqli_insert_id($this->conexion);
            }else{
                $lastId = "";
            }
            return $lastId ;
        }
    }
    

?>