<?php
    class Contacto{
        private $idContacto = 0;
        private $nombre;
        private $apellido1;
        private $apellido2;
        private $telefono;

        public function __construct($nombre, $apellido1, $apellido2, $telefono){
            $this->nombre = $nombre;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->telefono = $telefono;
        }

        public function setId($id){
            $this->idContacto = $id;
        }

        public function getidContacto(){
            return $this->idContacto;
        }
        
        public function getTelefono(){
            return $this->telefono;
        }

        public function __toString(){
            return "idContacto: " . $this->idContacto . " | nombre: ". $this->nombre ." | apellidos: " . $this->apellido1 . " " . $this->apellido2 . " | telefono: " . $this->telefono;
        }

        public function guardarDatos(){
            return "INSERT INTO `contactos` (`idContacto`, `nombre`, `apellido1`, `apellido2`, `telefono`) VALUES (NULL, '" . $this->nombre . "', '" . $this->apellido1 . "', '" . $this->apellido2 . "', '" . $this->telefono . "')";
        }

        public function eliminarContacto(){
            return "DELETE FROM contactos WHERE `contactos`.`idContacto` = $this->idContacto";
        }

        //
    }
?>