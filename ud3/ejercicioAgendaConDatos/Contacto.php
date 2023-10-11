<?php
    class Contacto{
        private $idContacto;
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

        public function __toString(){
            return "id contacto: " . $this->idContacto . "<br>nombre: . $this->nombre .<br>apellidos: " . $this->apellido1 . " " . $this->apellido2 . "<br>telefono: " . $this->telefono;
        }

        public function guardarDatos(){
            return "INSERT INTO `contactos` (`nombre`, `apellido1`, `apellido2`, `telefono`) VALUES ('" . $this->nombre . "', '" . $this->apellido1 . "', '" . $this->apellido2 . "', '" . $this->telefono . "')";
        }
    }
?>