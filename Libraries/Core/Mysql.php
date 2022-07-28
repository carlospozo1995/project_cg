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

        // DEVOLVER TODOS DATOS

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

        // INSERTAR DATOS
        public function insert(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            if ($result) {
                $lastId = mysqli_insert_id($this->conexion);
            }else{
                $lastId = "";
            }
            return $lastId ;
        }

        // DEVOLVER UN DATO

        public function select(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            
            $data = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $data[] = $item;

            }
            if (empty($data)) {
                return $data;
            }else{
                return $data[0];
            }
        }

        // ACTUALIZAR UN DATO

        public function update(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            
            return $result;
        }
    
        // BORRAR DATO 
        public function delete(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            
            return $result;
        }

        public function concat(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            $data = array();
            while ($item = mysqli_fetch_assoc($result)) {
                $data[] = $item;
            }
            return $data[0];   
        }

        // RESETEAR CONTEO ID TABLE
        public function resetDT(string $query)
        {
            $this->strquery = $query;
            $result = $this->conexion->query($this->strquery);
            return  $result;
        }
    }
    

?>