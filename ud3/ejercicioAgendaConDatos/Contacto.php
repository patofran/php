<?php
    class Contacto{
        private static $idContacto = 0;
        private $nombre;
        private $apellido1;
        private $apellido2;
        private $telefono;

        public function __set ($atributo, $valor){
            $this -> $atributo = $valor;
        }

        public function __get ($contenido){
            return $this -> $contenido;
        }

        public function __construct($nombre, $apellido1, $apellido2, $telefono){
            $this->nombre = $nombre;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->telefono = $telefono;
            $this->idContacto++;
        }

        public function __toString(){
            return "id contacto: " . $this->idContacto . "<br>nombre: " . $this->nombre . "<br>apellidos: " . $this->apellido1 . " " . $this->apellido2 . "<br>telefono: " . $this->telefono;
        }
    }
?>